@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create User</h4>
                    <form class="forms-sample" action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" >
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastname">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input readonly type="email" name="email" class="form-control" id="email" placeholder="@e-library.com">
                        </div>
                        <div class="form-group">
                            <label for="role">System Role</label>
                            <select name="role" id="role" class="form-control">
                                <option>Select Option</option>
                                <option value="Admin">Admin</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Student">Student</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        const lastName = document.getElementById('lastname');

        lastName.addEventListener('input', function() {
            const firstName = document.getElementById('firstname');
            document.getElementById('email').value = (firstName.value + lastName.value).toLowerCase() + '@e-library.com';
        })
    </script>

@endsection
