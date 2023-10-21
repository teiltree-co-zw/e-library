<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ClassBook;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\ReadingRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    //

    public function index($id)
    {
        $records = ReadingRecord::where('book_id', $id)->paginate(10);
        $book = Book::findOrFail($id);

        return view('reports.index', compact('records', 'book'));
    }

    public function reports()
    {
        if (Auth::user()->role == 'Teacher') {
            $teacher = Teacher::where('user_id', Auth::user()->id)->first();
            $class = DB::table('teachers_grades')->where('teacher_id', $teacher->id)->first();
            $books = [];

            if ($class) {
                $c = Grade::findOrFail($class->class_id);
                $grade = $c->name;
                // get all books in your class
                $found = ClassBook::where('class_id', $class->class_id)->get();


                foreach ($found as $f) {
                    $book = Book::findOrFail($f->book_id);
                    $books[] = $book;
                }

            } else {
                $grade = null;
            }

            return view('reports.books', compact('books','grade'));

        }

        $books = Book::all();
        $grade = null;

        return view('reports.books', compact('books','grade'));
    }
}
