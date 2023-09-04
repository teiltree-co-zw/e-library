@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Teachers</h4>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th colspan="3" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->firstname }}&nbsp;{{ $teacher->lastname }}</td>
                                <td>{{ $teacher->user->email }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary rounded" href="{{ route('teachers.show', $teacher) }}">
                                        <i class="mdi mdi-view-agenda"></i>
                                        Manage Classes
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success rounded" href="{{ route('teachers.edit',$teacher) }}"><i class="mdi mdi-tooltip-edit"></i> Update Details</a>
                                </td>
                                <td>
                                    <form action="{{ route('teachers.destroy', $teacher) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-sm btn-danger rounded"
                                        ><i class="mdi mdi-archive"></i> Remove Teacher</button
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
