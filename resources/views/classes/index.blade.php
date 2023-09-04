@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Classes</h4>
                    <a href="{{ route('classes.create') }}" class="btn btn-success btn-sm float-end"><i class="mdi mdi-folder-plus"></i> New Class</a>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th colspan="3">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Grade 1 Red</td>
                            <td>
                                <a class="btn btn-sm btn-primary rounded" href="#"><i class="mdi mdi-view-agenda"></i> View Class</a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success rounded" href="#"><i class="mdi mdi-tooltip-edit"></i> Edit Class</a>
                            </td>
                            <td>
                                <form action="#" method="post">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-sm btn-danger rounded"
                                    ><i class="mdi mdi-archive"></i> Delete Class</button
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
