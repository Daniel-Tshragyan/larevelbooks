@extends('layout')
@section('content')
<h1 align="center"> change Book</h1>
<input type="hidden" class="token" value="{{@csrf_token()}}">
<input type="text" name="title" value="{{ $book->title }}" placeholder="title" class=" title form-control">
<p style="display:none" class="text-danger titleerr"></p>
<input type="hidden" value="{{ $book->id }}" class="id">
@if ($errors->has('title'))
    <p class="text-danger">{{ $errors->first('title') }}</p>
@endif

<select name="authors" id="" class="authors form-control" multiple="multiple">
    @foreach($authors as $author)

        <option value="{{ $author->id }}"
                @if(array_key_exists($author->name, $belongs))
                selected="selected"
            @endif
        >{{ $author->name }}</option>
    @endforeach
</select>
@if ($errors->has('authors'))
    <p class="text-danger">{{ $errors->first('authors') }}</p>
@endif
<p style="display:none" class="text-danger autherr"></p>

<br>
<button class="btn btn-success cons" type="submit">Change Book</button>
<p style="display:none" class="success text-success">Book changed</p>

<script src="{{ asset('js/change-book.js') }}"></script>

@endsection
