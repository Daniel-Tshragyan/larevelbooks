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
    <h1> Book Title : {{ $book->title }}</h1>
    <h3>Authors</h3>
    <ul>
        @foreach($authors as $key => $value)
            <li>
                {{ $key }}
            </li>
        @endforeach
    </ul>
    <form action="{{ route('removebook') }}" method="post">
        <input type="hidden" name="id" value="{{ $book->id }}">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">remove</button>
    </form>
    <br>
    <button class="btn btn-danger"><a style="color:black" href="{{ route('changebook',['id' => $book->id])}}">Edit</a>
    </button>
</body>
</html>
