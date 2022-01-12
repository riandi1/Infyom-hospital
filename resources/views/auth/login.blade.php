@extends('layouts.auth_app')

@section('title')
    Login
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('web/css/web.css') }}" type="text/css">
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-11 login col-sm-12 col-12 mt-sm-0 mt-2">
            @include('flash::message')
            <div class="card-group">
                <div class="card p-4 mt-xs-10">
                    <div class="card-body">
                        <form method="post" action="{{ url('/login') }}">
                            @csrf
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="icon-user"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control {{ $errors->any()?'is-invalid':'' }}"
                                       name="email"
                                       value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}"
                                       placeholder="Email" required>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input type="password"
                                       class="form-control {{ $errors->any()?'is-invalid':'' }}"
                                       placeholder="Password" name="password"
                                       value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                                       required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4" type="submit">Login</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-8 col-sm-12 mt-2">
                                    <input type="checkbox"
                                           name="remember" {{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
                                    Remember Me
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 text-right">
                                    <a class="btn btn-link px-0" href="{{ url('/password/reset') }}">
                                        Forgot password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card text-white bg-primary p-4">
                    <div class="card-body text-center">
                        <div>
                            <h2>Sign up</h2>
                            <p>In just few seconds, you can sign up an account using Register button and get started
                                using our system and it's services.</p>
                            <a class="btn btn-primary active mt-3" href="{{ url('/register') }}">Register Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
