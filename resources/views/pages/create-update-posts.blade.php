@extends('layouts.layouts')

@section('title')
    Post update or create
@endsection


@section('body')

    <form action="" method="post">
        @csrf
        {{--        <div class="mb-3 mt-5">--}}
        {{--            <label class="form-label">Id post</label>--}}
        {{--            <input type="text" name="id" class="form-control" id="exampleInputPassword1" value="" disabled>--}}
        {{--        </div>--}}
        <div class="mb-3 mt-5">
            <label class="form-label">Name category</label>
            <input type="text" name="name" class="form-control" id="">
        </div>
        <div class="mb-3 mt-5">
            <label class="form-label">Name category</label>
            <input type="text" name="name" class="form-control" id="">
        </div>
        <div class="mb-3 mt-5">
            <label class="form-label">Name category</label>
            <input type="text" name="name" class="form-control" id="">
        </div>

        <div class="mb-3 mt-5 ">
            <label class="form-label">Select tags</label>
            <div style="height: 200px; overflow-y: scroll; border: solid;">
                @foreach($tags as $el)
                    <p><input name="" type="checkbox"> {{$el->name}}</p>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection
