@extends('layouts.app')

@section('content')

<div class="card p-2">
    <a href="{{ route('students.index') }}" class="btn rounded btn-success">Go Back to Students</a>

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-success">Update Student</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('students.update',$student) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">First Name</label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="mdi mdi-account-multiple menu-icon"></i
                            ></span>
                            <input
                                type="text"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                placeholder="John"
                                name="firstname"
                                required
                                value="{{ $student->firstname }}"
                            />
                        </div>
                        @error('firstname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Surname</label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="mdi mdi-account-multiple menu-icon"></i
                            ></span>
                            <input
                                type="text"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                placeholder="Doe"
                                name="lastname"
                                required
                                value="{{ $student->lastname }}"
                            />
                        </div>
                        @error('lastname')
                            <small class="text-red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">User Id</label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class="mdi mdi-account-multiple menu-icon"></i
                            ></span>
                            <input
                                type="number"
                                name="user_id"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                placeholder="1"
                                value="{{ $student->user_id }}"
                            />
                        </div>
                        @error('user_id')
                            <small class="text-red">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection