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
</button>
</body>
</html>
