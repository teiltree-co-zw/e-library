@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-end"><i class="mdi mdi-account-plus"></i> New User</a>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th colspan="3" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->firstname }}&nbsp;{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary rounded" href="#"><i class="mdi mdi-power"></i> Reset Password</a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success rounded" href="{{ route('users.edit', $user) }}"><i class="mdi mdi-tooltip-edit"></i> Update Details</a>
                                </td>
                                <td>
                                    <form action="{{ route('users.destroy', $user) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-sm btn-danger rounded"
                                        ><i class="mdi mdi-archive"></i> Delete</button
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
