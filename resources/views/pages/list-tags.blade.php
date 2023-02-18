@extends('layouts.layouts')

@section('title')
    list-tags
@endsection


@section('body')

    <a href="/create-teg" class="m-3 btn btn-primary">create new teg</a>

    @if(isset($successMessage))
        <div class="alert alert-success">
            <ul>
                <li>{{$successMessage}}</li>
            </ul>
        </div>
    @endif

    <table class="table table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>
        @foreach($tags as $el)
            <tr>
                <form action="/delete-teg/{{$el->id}}" method="POST">
                    <th scope="row">{{$el->id}}</th>
                    <td>{{$el->name}}</td>
                    <td><a href="update-teg/{{$el->id}}" class="btn btn-primary">update</a></td>
                    <td>
                        <button type="submit" class="btn btn-danger">delete</button>
                    </td>
                </form>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
