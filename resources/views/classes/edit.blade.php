@extends('layouts.app')

@section('content')

<div class="card p-2">
    <a href="{{ route('classes.index') }}" class="btn rounded btn-success">Go Back to Classes</a>

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-success">Add New Class</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('classes.update',$class) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Class Name</label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="mdi mdi-account-multiple menu-icon"></i
                            ></span>
                            <input
                                type="text"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                placeholder="1 Red"
                                name="name"
                                required
                                value="{{ $grade->name }}"
                            />
                        </div>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection