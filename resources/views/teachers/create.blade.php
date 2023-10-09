@extends('layouts.app')

@section('content')
<div class="card p-2">
    <a href="{{ route('teachers.index') }}" class="btn rounded btn-success">Go Back to Teachers</a>

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-success">Add New Teacher</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('teachers.store') }}">
                    @csrf
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
                                placeholder="John"
                                name="first_names"
                                required
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
                                placeholder="Doe"
                                name="surname"
                                required
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
                                placeholder="johndoe@example.com"
                                name="email"
                                required
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
                                placeholder="0768980612"
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
                                class="form-control phone-mask"
                                placeholder="1"
                            />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
