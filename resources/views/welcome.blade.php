<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<h1 align="center">
    Books
</h1>

@if(!empty($books))
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>title</td>

        </tr>
        @foreach($books as $book)
            <tr>
                <td>
                    {{ $book->id }}
                </td>
                <td>
                    <a href="{{ route('book',['id' => $book->id]) }}">{{ $book->title }}</a>
                </td>

            </tr>
        @endforeach

    </table>
    <button class="btn btn-success"><a href="{{ route('addBook') }}">Add Books</a></button>
@else
    <button class="btn btn-success"><a href="{{ route('addBook') }}">Add Books</a></button>
@endif

<h1 align="center">
    Authors
</h1>

@if(!empty($authors))
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>name</td>
        </tr>
        @foreach($authors as $author)
            <tr>
                <td>
                    {{ $author->id }}
                </td>
                <td>
                    <a href="{{ route('author',['id' => $author->id]) }}">{{ $author->name }}</a>
                </td>
            </tr>
        @endforeach

    </table>
    <button class="btn btn-success"><a href="{{ route('addAutor') }}">Add Author</a></button>
@else
    <button class="btn btn-success"><a href="{{ route('createAuthor') }}">Add Author</a></button>
@endif
@if(Session::has('message'))
    <p class="text-success">{{ Session::get('message') }}</p>
@endif

</body>
</html>
