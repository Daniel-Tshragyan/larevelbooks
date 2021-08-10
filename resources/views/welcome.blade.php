@extends('layout')
@section('content')


<h1 align="center">
    Books
</h1>

@if(!empty($books))
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>title</td>

        </tr>
        @foreach($books as $book)
            <tr>
                <td>
                    {{ $book->id }}
                </td>
                <td>
                    <a href="{{ route('book.show',['book' =>$book]) }}">{{ $book->title }}</a>
                </td>

            </tr>
        @endforeach

    </table>
    <button class="btn btn-success"><a href="{{ route('book.create') }}">Add Books</a></button>
@else
    <button class="btn btn-success"><a href="{{ route('book.create') }}">Add Books</a></button>
@endif

<h1 align="center">
    Authors
</h1>

@if(!empty($authors))
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>name</td>
        </tr>
        @foreach($authors as $author)
            <tr>
                <td>
                    {{ $author->id }}
                </td>
                <td>
                    <a href="{{ route('author.show',['author' => $author]) }}">{{ $author->name }}</a>
                </td>
            </tr>
        @endforeach

    </table>
    <button class="btn btn-success"><a href="{{ route('author.create') }}">Add Author</a></button>
@else
    <button class="btn btn-success"><a href="{{ route('author.create') }}">Add Author</a></button>
@endif
@if(Session::has('message'))
    <p class="text-success">{{ Session::get('message') }}</p>
@endif
@endsection
