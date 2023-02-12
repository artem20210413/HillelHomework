@extends('layouts.layouts')

@section('title')
    Всі
@endsection


@section('body')
    <h1>This body</h1>

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
                <th scope="row">{{$el->id}}</th>
                <td>{{$el->name}}</td>
                <td><a href="#" class="btn btn-primary">update</a></td>
                <td><a href="#" class="btn btn-danger">delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
