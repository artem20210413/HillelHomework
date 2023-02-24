@extends('layouts.auth-layouts')

@section('title')
    Login
@endsection

@section('body')

    <div class="card col-6 offset-3" style="border-radius: 15px;">
        <div class="card-body p-5">
            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

            <form action="/registration" method="post">

                <div class="form-outline mb-4">
                    <input type="text" name="userName" class="form-control form-control-lg">
                    <label class="form-label" for="form3Example1cg" style="margin-left: 0px;">Your Name</label>
                    @error('userName')
                    <div class="alert alert-danger mt-3">
                        <ul>
                            <li>{{$message}}</li>
                        </ul>
                    </div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="email" name="email" class="form-control form-control-lg">
                    <label class="form-label" for="form3Example3cg" style="margin-left: 0px;">Your Email</label>
                    @error('email')
                    <div class="alert alert-danger mt-3">
                        <ul>
                            <li>{{$message}}</li>
                        </ul>
                    </div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="password" name="password" class="form-control form-control-lg">
                    <label class="form-label" for="form3Example4cg" style="margin-left: 0px;">Password</label>
                    @error('password')
                    <div class="alert alert-danger mt-3">
                        <ul>
                            <li>{{$message}}</li>
                        </ul>
                    </div>
                    @enderror

                </div>

                {{--                <div class="form-outline mb-4">--}}
                {{--                    <input type="password" class="form-control form-control-lg">--}}
                {{--                    <label class="form-label" for="form3Example4cdg" style="margin-left: 0px;">Repeat your--}}
                {{--                        password</label>--}}
                {{--                </div>--}}


                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg">
                        Register
                    </button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account?
                    <a href="/login" class="fw-bold text-body"><u>Login here</u></a></p>

            </form>
            </form>

        </div>
    </div>

@endsection
