@extends('layouts.layouts')

@section('title')
    update-teg
@endsection


@section('body')

    <form action="/update-teg/{{$teg->id}}" method="post">
        @csrf
        <div class="mb-3 mt-5">
            <label class="form-label">Id teg</label>
            <input type="text" name="id" class="form-control" id="exampleInputPassword1" value="{{$teg->id}}">
        </div>
        <div class="mb-3 mt-5">
            <label class="form-label">Name teg</label>
            <input type="text" name="name" class="form-control" id="exampleInputPassword1" value="{{$teg->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection