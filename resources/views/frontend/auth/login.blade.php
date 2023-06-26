@extends('layouts.auth')

@section('content')
<div class="auth-one-bg-position auth-one-bg" id="auth-particles">
    <div class="bg-overlay"></div>
    <div class="shape">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 1440 120">
            <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
        </svg>
    </div>
</div>

<div class="auth-page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mt-sm-5 mb-4 text-white-50">
                    <div>
                        <a href="index.html" class="d-inline-block auth-logo">
                            <img src="assets/images/logo-light.png" alt="" height="20">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mt-4">
                    <div class="card-body p-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary">Welcome Back !</h5>
                            <p class="text-muted">Please enter your email address and password</p>
                        </div>
                        <div class="p-2 mt-4">
                            @if(Session::has('fail'))
                            <div class="alert alert-danger">
                                {{Session::get('fail')}}
                            </div>
                            @endif
                            @if (session('message'))
                                <div class="alert alert-danger">{{ session('message') }}</div>
                            @endif
                            <form class="form" method="POST" action="{{ route('frontend.customer-login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="float-end">
                                        <a href="{{ route('frontend.reset') }}" class="text-muted">Forgot password?</a>
                                    </div>
                                    <label class="form-label" for="password-input">Password</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" name="password" id="password-input" class="form-control pe-5 password-input @error('password') is-invalid @enderror" required>
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-success w-100" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <p class="mb-0">Don't have an account ? <a href="{{route('frontend.register')}}" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
