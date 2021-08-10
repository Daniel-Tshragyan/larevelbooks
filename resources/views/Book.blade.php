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
@endsection
