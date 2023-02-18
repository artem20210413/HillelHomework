@extends('layouts.layouts')

@section('title')
    Post update or create
@endsection


@section('body')

    <form action="" method="post">
        @csrf
        @if($errors && $errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3 mt-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="category_id" aria-label="Default select example">
                @foreach($category as $el)
                    <option @if($post->category_id == $el->id)selected @endif value="{{$el->id}}">{{$el->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 mt-5">
            <label class="form-label">Header</label>
            <input type="text" name="header" class="form-control" id="" value="{{$post->header}}">
        </div>
        <div class="mb-3 mt-5">
            <label class="form-label">Comments</label>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" name="comment" id="floatingTextarea2"
                          style="height: 100px">{{$post->comment}}</textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
        </div>

        <div class="mb-3 mt-5 ">
            <label class="form-label">Select tags</label>
            <div class="offset-4 col-4" style="height: 200px; overflow-y: scroll; border: solid;">
                @foreach($tags as $el)
                    <p><input name="tags[{{$el->id}}]" type="checkbox"
                              @foreach($post->teg as $teg)
                              @if($teg->id == $el->id)
                              checked
                            @endif
                            @endforeach
                        > {{$el->name}}</p>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary m-3">Save</button>
    </form>

@endsection
