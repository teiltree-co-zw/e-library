@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h1 class="text-success">Report</h1>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Book Name</th>
                            <th>Read By</th>
                            <th>Duration</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($records as $record)
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $record->book->name }}</th>
                            <th>{{ $record->student->firstname }}&nbsp;{{ $record->student->lastname }}</th>
                            {{-- <th>{{ $record->getReadingDurationAttribute() }}</th> --}}
                            <th></th>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
