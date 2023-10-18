<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'Student')
        {
            return redirect()->route('library.index');
        }

        $students = Student::count();
        $classes = Grade::count();
        $books = Book::count();
        $teachers = Teacher::count();

        return view('home', compact('teachers', 'students', 'classes', 'books'));
    }
}
