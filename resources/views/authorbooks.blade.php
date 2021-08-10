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
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>title</td>
        </tr>
        @foreach($books as $key => $value)
            <tr>
                <td>
                    {{ $value }}
                </td>
                <td>
                    {{ $key }}
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
