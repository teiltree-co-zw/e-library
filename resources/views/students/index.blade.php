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
                        <tr>
                            <td>John Doe</td>
                            <td>jdoe@elibrary.com</td>
                            <th>Grade 1 Red</th>
                            <td>
                                <a class="btn btn-sm btn-primary rounded" href="#"><i class="mdi mdi-view-agenda"></i> Read Books</a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success rounded" href="#"><i class="mdi mdi-tooltip-edit"></i> Update Details</a>
                            </td>
                            <td>
                                <form action="#" method="post">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-sm btn-danger rounded"
                                    ><i class="mdi mdi-archive"></i> Delete Student</button
                                    >
                                </form>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
