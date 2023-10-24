@extends('layouts.guest')

@section('content')
    <style>
        .fly-in {
            display: none;
            position: relative;
            left: -100px;
            opacity: 0;
            transition: left 1s ease-in-out, opacity 1s ease-in-out;
        }

        .fly-in.show {
            display: block;
            left: 0;
            opacity: 1;
        }
        .loading-spinner {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .spinner {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            animation: spin 4s linear infinite;
        }

        .loading-text {
            margin-top: 10px;
            font-size: 18px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <div class="row flex-grow" id="loading-spinner">
        <div class="col-lg-4 mx-auto">
                <div class="loading-spinner">
                    <div class="spinner"></div>
                    <div class="brand-logo loading-text">powered by <span class="font-weight-bold" style="font-size: 28px;">Mahlamvana</span></div>
                </div>
        </div>
    </div>

    <div id="main" class="fly-in row flex-grow">
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
    <script>
        // Hide the spinner after 5 seconds
        setTimeout(function() {
            document.getElementById('loading-spinner').style.display = 'none';
            document.getElementById('main').classList.add('show');
            // document.getElementById('main').style.display = 'block'
        }, 4000);
    </script>
@endsection
