@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Books</h4>
                    <a href="{{ route('books.create') }}" class="btn btn-success btn-sm float-end"><i class="mdi mdi-folder-plus"></i> Upload New Book</a>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th colspan="3">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Sunrise Readers</td>
                            <td>
                                <a class="btn btn-sm btn-primary rounded" href="#"><i class="mdi mdi-view-agenda"></i> Assign To Class</a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success rounded" href="#"><i class="mdi mdi-tooltip-edit"></i> Update Details</a>
                            </td>
                            <td>
                                <form action="#" method="post">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-sm btn-danger rounded"
                                    ><i class="mdi mdi-archive"></i> Remove Book</button
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
