@extends('layouts.app')
@section('content')
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card card-pages mt-4">
                        <div class="card-log">
                            <div class="text-center mt-0 mb-3">
                                <h1 class="text-white" style="font-family: Josefin Sans, sans-serif; line-height: 60pt;margin-bottom: 0px; margin: 0px">Astro CMS</h1>
                                <p class="text-muted w-75 mx-auto mb-4 mt-4">Don't have an account? Create your account, it takes less than a minute</p>
                            </div>

                            <form method="POST" action="{{ route('register') }}" class="form-horizontal mt-4">
                                @csrf
                                <div class="form-group">
                                    <div class="col-12">
                                        <label class="text-muted" for="username">Name</label>
                                        <input class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" type="text" id="username" placeholder="Enter username">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <label class="text-muted" for="email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="text" id="email" placeholder="Enter email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <label class="text-muted" for="role_name">Role Name</label>
                                        <select class="form-control @error('role_name') is-invalid @enderror" name="role_name" id="role_name">
                                            <option selected disabled>Select Role</option>
                                            <option value="C">Admin</option>
                                            <option value="B">Team Member</option>
                                            <option value="A">Client</option>
                                        </select>
                                    </div>
                                    @error('role_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <label class="text-muted" for="password">Password</label>
                                        <input class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" type="password" id="password" placeholder="Enter password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <label class="text-muted" for="password">Password confirm</label>
                                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter password confirm">
                                    </div>
                                </div>
                                <div class="form-group text-center mt-4">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register</button>
                                    </div>
                                </div>
                                <div class="form-group text-center mt-2 mb-6">
                                    <div class="col-12">
                                        <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="mt-4 text-muted">Sign up with</p>
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