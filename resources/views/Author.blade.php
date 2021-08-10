<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1> Book Title : {{ $author->name }}</h1>
<h3>Authors</h3>
{{my_books($author)}}
<form action="{{ route('author.destroy',['author' => $author]) }}" method="post">
    <input type="hidden" name="id" value="{{ $author->id }}">
    @csrf
    @method('delete')
    <button class="btn btn-danger" type="submit">remove</button>
</form>
<br>
<button class="btn btn-primary"><a style="color:black" href="{{ route('author.edit',['author' => $author])}}">Edit</a>
</button>
</body>
</html>
