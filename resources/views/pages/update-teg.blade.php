@extends('layouts.layouts')

@section('title')
    update-teg
@endsection


@section('body')

    <form action="/admin/update-teg/{{$teg->id}}" method="post">
        @csrf
        <div class="mb-3 mt-5">
            @if($errors && $errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label class="form-label">Id teg</label>
            <input type="text" name="id" class="form-control" id="exampleInputPassword1" value="{{$teg->id}}" disabled>
        </div>
        <div class="mb-3 mt-5">
            <label class="form-label">Name teg</label>
            <input type="text" name="name" class="form-control" id="exampleInputPassword1" value="{{$teg->name}}">
        </div>
        <button type="submit" class="btn btn-primary  m-3">Save</button>
    </form>

@endsection
