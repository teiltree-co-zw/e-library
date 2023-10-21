@php use Carbon\Carbon;
 use Carbon\CarbonInterface;
 @endphp
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-4">
                        <a href="{{ route('reports') }}" class="btn rounded btn-success">Return Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h1 class="text-success">Book Reading Report: <b>{{ $book->name }}</b></h1>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Student</th>
                            <th>Date</th>
                            <th>Duration</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <th>{{ $record->student->firstname }}&nbsp;{{ $record->student->lastname }}</th>
                                <th>{{ $record->created_at->format('j F Y') }}</th>
                                <th>{{ Carbon::parse($record->read_end)->diffForHumans($record->read_start, CarbonInterface::DIFF_ABSOLUTE) }}</th>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {!! $records->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
