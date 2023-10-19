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

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        /**
         * get logged user class if student and retrieve books related to that class
         *
         */
        if (Auth::user()->role == 'Student')
        {
            $student = Student::where('user_id',Auth::user()->id)->first();
            $class = StudentClass::where('student_id',$student->id)->first();
            $books = [];

            if ($class) {
                $grade = $class->grade($class->class_id);

                // get all books in your class
                $found = ClassBook::where('class_id', $class->class_id)->get();



                foreach ($found as $f)
                {
                    $book = Book::findOrFail($f->book_id);
                    $books[] = $book;
                }
            }else{
                $grade = null;
            }

//            dd($books);

            return view('library.index', compact('books', 'grade'));

        }elseif (Auth::user()->role == 'Teacher')
        {
            $teacher = Teacher::where('user_id',Auth::user()->id)->first();
            $class = DB::table('teachers_grades')->where('teacher_id',$teacher->id)->first();
            $books = [];

            if ($class){
                $c = Grade::findOrFail($class->class_id);
                $grade = $c->name; 
                // get all books in your class
                $found = ClassBook::where('class_id', $class->class_id)->get();



                foreach ($found as $f)
                {
                    $book = Book::findOrFail($f->book_id);
                    $books[] = $book;
                }

            }else{
                $grade = null;
            }


            return view('library.index', compact('books', 'grade'));

        }

        $books = Book::all();
        $grade = null;

        return view('library.index', compact('books', 'grade'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * when a book is opened create a reading record for that student
         */
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
