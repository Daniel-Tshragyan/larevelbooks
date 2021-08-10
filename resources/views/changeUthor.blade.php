<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<h1 align="center">Change Author</h1>
<form action="{{ route('editAuthor') }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="name" class="form-control" value="{{ $author->name }}">
    @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @endif
    <br>
    <input type="hidden" name="id" value="{{ $author->id }}">
    <button type="submit" class="btn btn-success">Change</button>
</form>
@if(Session::has('message'))
    <p class="text-success">{{ Session::get('message') }}</p>
@endif
</body>
</html>
