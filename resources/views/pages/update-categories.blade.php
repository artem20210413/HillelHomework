@extends('layouts.layouts')

@section('title')
    update-categories
@endsection


@section('body')

    <form action="/update-categories/{{$category->id}}" method="post">
        @csrf
        <div class="mb-3 mt-5">
            <label class="form-label">Id category</label>
            <input type="text" name="id" class="form-control" id="exampleInputPassword1" value="{{$category->id}}">
        </div>
        <div class="mb-3 mt-5">
            <label class="form-label">Name category</label>
            <input type="text" name="name" class="form-control" id="exampleInputPassword1" value="{{$category->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection
