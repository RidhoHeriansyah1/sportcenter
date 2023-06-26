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
                            <h5 class="text-primary">Create an customer account</h5>
                            <p class="text-muted">Please fill in the information below</p>
                        </div>
                        <div class="p-2 mt-4">
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert alert-danger">
                                {{Session::get('fail')}}
                            </div>
                            @endif
                            <form class="form" method="POST" action="{{ route('frontend.customer-register') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Fullname <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password-input">Password <span class="text-danger">*</span></label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" name="password" id="password-input" class="form-control pe-5 password-input @error('password') is-invalid @enderror" required>
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        @if ($errors->has('password'))
                                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control" required />
                                </div>

                                <div class="mb-4">
                                    <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the Velzon <a
                                            href="#"
                                            class="text-primary text-decoration-underline fst-normal fw-medium">Terms of
                                            Use</a></p>
                                </div>

                                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                    <h5 class="fs-13">Password must contain:</h5>
                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                    <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                    <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                    <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-success w-100" type="submit">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <p class="mb-0">Already have an account? <a href="{{route('frontend.login')}}" class="fw-semibold text-primary text-decoration-underline"> Sign In </a> </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
