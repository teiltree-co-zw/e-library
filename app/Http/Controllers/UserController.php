<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use function Symfony\Component\String\u;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::latest()->paginate(20);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'role' => 'required',
            'email' => 'required|email'
        ]);


        $password = Str::random(8);

        $validated['password'] = Hash::make($password);

        $user = User::create($validated);

        if($validated['role'] == 'Teacher')
        {
            Teacher::create([
                'user_id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname
            ]);
        }
        elseif ($validated['role'] == 'Student')
        {
            Student::create([
                'user_id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully! '.$password);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

    }
}
