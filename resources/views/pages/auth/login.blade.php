@extends('layouts.auth-layouts')

@section('title')
    Login
@endsection


@section('body')

    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-7">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <h3 class="text-uppercase text-center mb-5">LOGIN TO ACCOUNT</h3>

                    <form action="/login" method="post">
                        @csrf
                        @if (session('errorLogin'))

                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{session('errorLogin')}}</li>
                                </ul>
                            </div>
                        @endif

                        <div class="form-outline mb-4 text-center">
                            <label class="form-label " style="margin-left: 0px;">Email address</label>
                            <input type="tel" name="email" class="form-control form-control-lg">
                            @error('email')
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    <li>{{$message}}</li>
                                </ul>
                            </div>
                            @enderror
                        </div>

                        <div class="form-outline mb-4 text-center">
                            <label class="form-label" style="margin-left: 0px;">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg">
                            @error('password')
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    <li>{{$message}}</li>
                                </ul>
                            </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success btn-block">
                                Sign in
                            </button>
                        </div>
                        <p class="text-center text-muted mt-5 mb-0">Don't have an account yet?
                            <a href="/registration" class="fw-bold text-body"><u>Registration</u></a></p>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
