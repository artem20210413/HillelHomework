@extends('layouts.layouts')

@section('title')
    list-categories
@endsection


@section('body')

        <a href="/admin/create-categories" class="m-3 btn btn-primary">create new category</a>

        @if(isset($successMessage))
            <div class="alert alert-success">
                <ul>
                        <li>{{$successMessage}}</li>
                </ul>
            </div>
        @endif

        @if(isset($errorMessage))
            <div class="alert alert-danger">
                <ul>
                    <li>{{$errorMessage}}</li>
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
            @foreach($category as $el)
                <tr>
                    <form action="/admin/delete-categories/{{$el->id}}" method="POST">
                        <th scope="row">{{$el->id}}</th>
                        <td>{{$el->name}}</td>
                        <td><a href="/admin/update-categories/{{$el->id}}" class="btn btn-primary">update</a></td>
                        <td>
                            <button type="submit" class="btn btn-danger">delete</button>
                        </td>
                    </form>
                </tr>

            @endforeach
            </tbody>
        </table>
@endsection
