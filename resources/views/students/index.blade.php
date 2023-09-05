@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Students</h4>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Class</th>
                            <th colspan="3" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->firstname }}&nbsp;{{ $student->lastname }}</td>
                                <td>{{ $student->user->email }}</td>
                                <td></td>
                                <td>
                                    <a class="btn btn-sm btn-primary rounded" href="{{ route('students.show', $student) }}">
                                        <i class="mdi mdi-view-agenda"></i>
                                        Manage Classes
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success rounded" href="{{ route('students.edit',$student) }}">
                                        <i class="mdi mdi-tooltip-edit"></i> Update Details</a>
                                </td>
                                <td>
                                    <form action="{{ route('students.destroy', $student) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-sm btn-danger rounded"
                                        ><i class="mdi mdi-archive"></i> Delete Student</button
                                        >
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
