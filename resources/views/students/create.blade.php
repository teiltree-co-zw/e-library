@extends('layouts.app')

@section('content')

<div class="card p-2">
    <a href="{{ route('students.index') }}" class="btn rounded btn-success">Go Back to Students</a>

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-success">Add New Student</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('students.store') }}">
                    @csrf
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
                                placeholder="Example: John"
                                name="firstname"
                                required
                                value="{{ old('firstname') }}"
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
                                placeholder="Example: Doe"
                                name="lastname"
                                required
                                value="{{ old('lastname') }}"
                            />
                        </div>
                        @error('lastname')
                            <small class="text-red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">Email</label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class="mdi mdi-email-outline"></i
                            ></span>
                            <input
                                type="email"
                                name="email"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                placeholder="Example: johndoe@example.com"
                                value="{{ old('email') }}"
                            />
                        </div>
                        @error('email')
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