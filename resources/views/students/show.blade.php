@extends('layouts.app')

@section('content')
    <div class="card p-2">
        <a href="{{ route('students.index') }}" class="btn rounded btn-success">Go Back to Students</a>

        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-success">Assign Class</h5>
                    @if($grade)
                        <p class="text-primary">Currently enrolled: <b>{{ $grade->name }}</b></p>
                    @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('assign-student', $student) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">{{ $student->firstname }} {{ $student->lastname }}</label>
                            <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="mdi mdi-account-multiple menu-icon"></i
                            ></span>
                                <select class="form-control" name="grade_id" id="grade_id" required>
                                    <option selected>Select Grade</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('firstname')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Enroll Class</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
