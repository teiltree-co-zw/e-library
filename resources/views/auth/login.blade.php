@extends('layouts.guest')

@section('content')

    <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light rounded text-left p-5">
                        <div class="brand-logo">
                           <h2 class="text-center text-dark">E-Library</h2>
                        </div>
                        <h4>Hello! let's get started</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        <form class="pt-3" action="{{ route('login') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <input type="email"  id="exampleInputEmail1"
                                       class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="exampleInputPassword1">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Keep me signed in </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="auth-link text-black" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                        </form>
                    </div>
                </div>
            </div>

@endsection
