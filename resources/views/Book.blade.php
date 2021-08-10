@extends('layout')
@section('content')
<h1> Book Title : {{ $book->title }}</h1>
<h3>Authors</h3>
<ul>
    @foreach($authors as $key => $value)
        <li>
            {{ $key }}
        </li>
    @endforeach
</ul>
<form action="{{ route('book.destroy',['book' =>$book]) }}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-danger" type="submit">remove</button>
</form>
<br>
<button class="btn btn-danger"><a style="color:black" href="{{ route('book.edit',['book' =>$book])}}">Edit</a>
@endsection
