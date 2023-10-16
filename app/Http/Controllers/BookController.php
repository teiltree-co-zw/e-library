<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Grade;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('books.index');
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

        $validatedData = $request->validate([
            'name' => 'required|string',
            'book' => 'required|file|mimes:pdf,epub|max:2048',
            'grade_id' => 'required|exists:grades,id',
        ]);
        //
        $grade = Grade::findOrFail($validatedData['grade_id']);

        if ($request->file('book'))
        {
//            $path = $request->file('logo')->store('public/logo');
            $book = $request->file('book');
            $bookName = '';

            if($book->isValid())
            {
                $bookName = strtolower($validatedData['name']).'.'.$book->getClientOriginalExtension();
                $path = 'uploads/books/'.strtolower($grade).'/';

//                move uploaded image to public
                $book->move(public_path($path), $bookName);
            }
            $validatedData['book'] = $bookName;
        }

        Book::create($validatedData);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
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
    }
}
