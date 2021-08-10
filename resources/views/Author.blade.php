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
<ul>
    @foreach($authors as $key => $value)
        <li>
            {{ $key }}
        </li>
        @endforeach
</ul>
<form action="{{ route('removeauthor') }}" method="post">
    <input type="hidden" name="id" value="{{ $author->id }}">
    @csrf
    @method('delete')
    <button class="btn btn-danger" type="submit">remove</button>
</form>
<br>
<button class="btn btn-primary"><a style="color:black" href="{{ route('changeauthor',['id' => $author->id])}}">Edit</a>
</button>
</body>
</html>
