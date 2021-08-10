@extends('layout')
@section('content')
<h1 align="center"> Add Book</h1>
<input type="hidden" class="token" value="{{@csrf_token()}}">
<input type="text" name="title" placeholder="title" class=" title form-control">
<p style="display:none" class="text-danger titleerr"></p>

<select name="authors" id="" class="authors form-control" multiple="multiple">
    @foreach($authors as $author)
        <option value="{{ $author->id }}" >{{ $author->name }}</option>
    @endforeach
</select>
<p style="display:none" class="text-danger autherr"></p>

<br>
<button class="btn btn-success cons" type="submit">Add Book</button>
<p style="display:none" class="success text-success">Book Added</p>

@endsection

</body>
<script src="{{ asset('js/create-book.js') }}"></script>

</html>
