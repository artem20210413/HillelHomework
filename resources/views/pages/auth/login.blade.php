@extends('layouts.auth-layouts')

@section('title')
    Login
@endsection


@section('body')

    <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <form action="/login" method="post" style="width: 22rem;">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" name="email" id="form2Example1" class="form-control">
                <label class="form-label" for="form2Example1" style="margin-left: 0px;">Email address</label>
                @error('email')
                <div class="alert alert-danger mt-3">
                    <ul>
                        <li>{{$message}}</li>
                    </ul>
                </div>
                @enderror
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" class="form-control">
                <label class="form-label" for="form2Example2" style="margin-left: 0px;">Password</label>
                @error('password')
                <div class="alert alert-danger mt-3">
                    <ul>
                        <li>{{$message}}</li>
                    </ul>
                </div>
                @enderror
            </div>

        {{--            <!-- 2 column grid layout for inline styling -->--}}
        {{--            <div class="row mb-4">--}}
        {{--                <div class="col d-flex justify-content-center">--}}
        {{--                    <!-- Checkbox -->--}}
        {{--                    <div class="form-check">--}}
        {{--                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked="">--}}
        {{--                        <label class="form-check-label" for="form2Example31"> Remember me </label>--}}
        {{--                    </div>--}}
        {{--                </div>--}}

        {{--                <div class="col">--}}
        {{--                    <!-- Simple link -->--}}
        {{--                    <a href="#!">Forgot password?</a>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

        </form>
    </section>

@endsection
