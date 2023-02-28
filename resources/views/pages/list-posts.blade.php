@extends('layouts.layouts')

@section('title')
    list-tags
@endsection


@section('body')

    <a class="m-3 btn btn-primary" href="/admin/create-post">Create new post</a>

    @if(isset($successMessage))
        <div class="alert alert-success">
            <ul>
                <li>{{$successMessage}}</li>
            </ul>
        </div>
    @endif

    @error('name')
    <div class="alert alert-danger mt-3">
        <ul>
            <li>{{$message}}</li>
        </ul>
    </div>
    @enderror


    <table class="table table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">category_id</th>
            <th scope="col">header</th>
            <th scope="col">comment</th>
            <th scope="col">tags</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody style="cursor: pointer;">
        @foreach($posts as $el)
            <a href="/update-post/{{$el->id}}">
                <tr @can('update', $el) onclick="window.location = '/admin/update-post/{{$el->id}}'" @endcan>
                    <form action="/delete-post/{{$el->id}}" method="POST">

                        <th scope="row">{{$el->id}}</th>
                        <td>{{$el->category->name}}</td>
                        <td>{{$el->header}}</td>
                        <td>{{$el->comment}}</td>
                        <td>
                            @foreach($el->teg as $tegEl)
                                {{$tegEl->name}},
                            @endforeach
                        </td>

                        <td>
                            @can('delete', $el)
                                <button type="submit" class="btn btn-danger">delete</button>
                            @endcan
                        </td>
                    </form>
                </tr>
            </a>

        @endforeach
        </tbody>
    </table>
@endsection
