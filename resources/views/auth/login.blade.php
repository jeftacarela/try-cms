
@extends('layouts.app')
@section('content')
<div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="card card-pages shadow-none mt-4">
                        <div class="card-log" style="color: #2c3749">
                            <div class="text-center mt-0 mb-3">
                                <h1 class="text-white" style="font-family: Josefin Sans, sans-serif; line-height: 60pt;margin-bottom: 0px; margin: 0px">Astro CMS</h1>
                            </div>
                            {{-- message --}}
                            {!! Toastr::message() !!}
                            <form method="POST" action="{{ route('login') }}" class="form-horizontal mt-4">
                                @csrf
                                <div class="form-group">
                                    <div class="col-12">
                                        <label class="text-muted" for="username">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" id="email" name="email" placeholder="Enter email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <label class="text-muted" for="password">Password</label>
                                        <input class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" type="password" id="password" name="password" placeholder="Enter password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group text-center mt-4">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
                                <div class="form-group text-center mt-4">
                                    <div class="col-12">
                                        <div class="float-left">
                                            <a href="{{ route('forget-password') }}" class="text-muted"><i class="fa fa-lock mr-1"></i> Forgot your password?</a>
                                        </div>
                                        <div class="text-right">
                                            <a href="{{ route('register') }}" class="text-muted">Create an account</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="mt-4 text-muted">Sign in with</p>
                                    <ul class="social-list list-inline mb-2">
                                        <li class="list-inline-item">
                                            <a href="{{ route('login-google') }}" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
