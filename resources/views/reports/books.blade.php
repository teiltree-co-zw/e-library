@extends('layouts.app')

@section('content')
    <div class="mt-5">
        @if($grade)
            <h1 class="h2 page-title p-2">Class: {{ $grade }}</h1>
        @endif

        <div class="row">
            @foreach($books as $book)
                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 p-0 m-1">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $book->name }}</h5>
                            <img class="rounded" width="81" height="120" src="{{ asset('uploads/books/thumbnails/'.$book->thumbnail) }}" alt="{{ $book->name }}">
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('report', $book->id) }}" class="btn btn-sm btn-success rounded-pill">View Report</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
