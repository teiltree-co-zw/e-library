@extends('layouts.library')

@section('content')
    <div class="mt-5">
        <h2 class="h2 page-title p-2">Class: </h2>
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-3 p-2">
                    <div class="card">
                        <div class="card-header bg-dark-grey">
                            <h3>{{ $book->name }}</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                <img width="261" height="300" src="{{ asset('uploads/books/thumbnails/'.$book->thumbnail) }}" alt="{{ $book->name }}">
                            </p>
                        </div>
                        <div class="card-footer ">
                            <button class="btn btn-sm btn-success rounded-pill">Read</button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
