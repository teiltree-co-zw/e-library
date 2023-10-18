<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teachers = Teacher::all();

        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate incoming data
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required', Rule::unique('teachers', 'email')],
        ]);

        $password = Str::random(8);
        $validated['password'] = Hash::make($password);
        $validated['role'] = 'Teacher';

        $user = User::create($validated);

        Teacher::create([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'user_id' => $user->id
        ]);

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
        $class = DB::table('teachers_grades')->where('teacher_id', $teacher->id)->first();

        if ($class)
        {
            $grade = Grade::findOrFail($class->class_id);
        }else{
            $grade = null;
        }

        $grades = Grade::all();

        return view('teachers.show', compact('teacher', 'grade', 'grades'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'nullable|email|unique:teachers,email,'.$teacher->id,
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function assign_grade(Request $request, Teacher $teacher)
    {
        $check = DB::table('teachers_grades')->where('teacher_id', $teacher->id)->first();

        if ($check)
        {
            DB::table('teachers_grades')
                ->where('teacher_id', $teacher->id)
                ->update([
                    'class_id' => $request->grade_id
                ]);
        }
        else{

            DB::table('teachers_grades')->insert([
                'teacher_id' => $teacher->id,
                'class_id' => $request->grade_id
            ]);
        }

        $grade = Grade::findOrFail($request->grade_id);

        return back()->with('success', 'Teacher Assigned to '.$grade->name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfuly');
    }
}
