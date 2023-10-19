<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ClassBook;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        elseif (Auth::user()->role == 'Teacher')
        {
            $teacher = Teacher::where('user_id',Auth::user()->id)->first();
            $class = DB::table('teachers_grades')->where('teacher_id',$teacher->id)->first();

            if ($class){

                $c = Grade::findOrFail($class->class_id);
                $grade = $c->name;

                // get all books in your class
                $booksCount = ClassBook::where('class_id', $class->class_id)->count();
                $studentsCount = StudentClass::where('class_id', $class->class_id)->count();

                return view('teachers.dashboard', compact('booksCount', 'studentsCount', 'grade'));

            }else{
                $grade = null;
                $studentsCount = null;
                $booksCount = null;

                return view('teachers.dashboard', compact('booksCount', 'studentsCount', 'grade'));
            }
        }

        $students = Student::count();
        $classes = Grade::count();
        $books = Book::count();
        $teachers = Teacher::count();

        return view('home', compact('teachers', 'students', 'classes', 'books'));
    }
}
