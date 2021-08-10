@extends('layouts.layout')
@section('content')
<h1 align="center"> Add Book</h1>
<form action="{{ route('book.store') }}" method="post">
    @csrf
    <input type="text" name="title" placeholder="title" class=" title form-control">
    @if ($errors->has('title'))
        <p class="text-danger">{{ $errors->first('title') }}</p>
    @endif
    <select name="authors[]" id="" class="authors form-control" multiple="multiple">
        @foreach($authors as $author)
            <option value="{{ $author->id }}" >{{ $author->name }}</option>
        @endforeach
    </select>
    @if ($errors->has('authors'))
        <p class="text-danger">{{ $errors->first('authors') }}</p>
    @endif
    <button class="btn btn-success cons" type="submit">Add Book</button>
</form>
@if(Session::has('message'))
    <p class="text-success">{{ Session::get('message') }}</p>
@endif
<script src="{{ asset('js/create-book.js') }}"></script>

@endsection


