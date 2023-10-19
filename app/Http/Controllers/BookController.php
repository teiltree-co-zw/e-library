<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ClassBook;
use App\Models\Grade;
use App\Models\ReadingRecord;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\b;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $books = Book::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $grades = Grade::all();

        return view('books.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateGrade = $request->validate([
            'grade_id' => 'required|exists:grades,id',
        ]);

        $validatedData = $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name' => 'required|string',
            'book_path' => 'required|file|mimes:pdf,epub|max:2048',
        ]);
        //
        $grade = Grade::findOrFail($validateGrade['grade_id']);


        if ($request->file('book_path'))
        {
//            $path = $request->file('logo')->store('public/logo');
            $book = $request->file('book_path');
            $bookName = '';

            if($book->isValid())
            {
                $bookName = strtolower($validatedData['name']).'.'.$book->getClientOriginalExtension();
                $path = 'uploads/books/'.strtolower($grade->name).'/';

//                move uploaded image to public
                $book->move(public_path($path), $bookName);
            }
            $validatedData['book_path'] = $path.$bookName;
        }

        if ($request->file('thumbnail'))
        {
//            $path = $request->file('logo')->store('public/logo');
            $image = $request->file('thumbnail');
            $imageName = '';

            if($image->isValid())
            {
                $imageName = strtolower($validatedData['name']).'.'.$image->getClientOriginalExtension();

//                move uploaded image to public
                $image->move(public_path('uploads/books/thumbnails'), $imageName);
            }
            $validatedData['thumbnail'] = $imageName;
        }

        $book = Book::create($validatedData);

        ClassBook::create([
            'class_id' => $grade->id,
            'book_id' => $book->id
        ]);

        return redirect()->route('books.index')->with('success', 'Book created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        /**
         * Get student - store book reading record
         */
        if (Auth::user()->role == 'Student') {
            $student = Student::where('user_id', Auth::user()->id)->first();

            ReadingRecord::create([
                'book_id' => $book->id,
                'student_id' => $student->id,
                'datetime' => now(),
                'read_start' => now()
            ]);

            return view('books.show', compact('book'));
        }

       return view('books.show', compact('book'));
    }

    /**
     * Display the specified resource.
     */
    public function close(Book $book)
    {
        /**
         * Get student - store book reading record
         */
        if (Auth::user()->role == 'Student') {
            $student = Student::where('user_id', Auth::user()->id)->first();

            ReadingRecord::where('book_id', $book->id)->where('student_id', $student->id)->latest()->update([
                'read_end' => now()
            ]);
            return redirect()->route('library.index');
        }

        return redirect()->route('library.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();

        return back()->with('success', 'Book removed from the system.');
    }
}
