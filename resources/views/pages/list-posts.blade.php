@extends('layouts.layouts')

@section('title')
    list-tags
@endsection


@section('body')

    <a class="btn btn-primary" href="/create-posts" >Create</a>


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
            <tr>
                <form action="/delete-categories/{{$el->id}}" method="POST">
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
                        <button type="submit" class="btn btn-danger">delete</button>
                    </td>
                </form>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
