@extends('layouts.layouts')

@section('title')
    create-teg
@endsection


@section('body')

    <form action="/create-teg" method="post">
        @csrf
        <div class="mb-3 mt-5">
            <label class="form-label">Name teg</label>
            <input type="text" name="name" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection
