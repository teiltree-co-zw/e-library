@extends('layouts.app')

@section('content')
<div class="card p-2">
    <a href="{{ route('teachers.index') }}" class="btn rounded btn-success">Go Back to Teachers</a>

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-success">Update Teacher</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('teachers.update',$teacher) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">First Names</label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="mdi mdi-account-multiple menu-icon"></i
                            ></span>
                            <input
                                type="text"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                name="first_names"
                                required
                                value="{{ $teacher->first_names }}"
                            />
                        </div>
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
                                name="surname"
                                required
                                value="{{ $teacher->surname }}"
                            />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Email</label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="mdi mdi-account-multiple menu-icon"></i
                            ></span>
                            <input
                                type="email"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                name="email"
                                required
                                value="{{ $teacher->email }}"
                            />
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">Phone Number</label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class="mdi mdi-account-multiple menu-icon"></i
                            ></span>
                            <input
                                type="number"
                                name="phone_number"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                value="{{ $teacher->phone_number }}"
                            />
                        </div>
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
                                class="form-control"
                                value="{{ $teacher->user_id }}"
                            />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
