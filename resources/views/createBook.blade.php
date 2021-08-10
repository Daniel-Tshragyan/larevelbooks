<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
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


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $(".authors").select2()
        $(".cons").click(() => {
            var token = $(".token").val()
            var authors = $(".authors").val()
            var title = $(".title").val()
            $.ajax({
                url: "{{ route('book.store') }}",
                type: "post",
                data: {
                    title: title,
                    authors: authors,
                    _token: token
                },
                success: function () {
                    $(".success").css({"display": "block"})
                    $(".autherr").css({"display": "none"})
                    $(".titleerr").css({"display": "none"})

                },
                error: function (err) {
                    var myerr = JSON.parse(err.responseText)
                    if (myerr.errors.authors) {
                        $(".autherr").css({"display": "block"})
                        $(".autherr").html(myerr.errors.authors)
                    }
                    if (myerr.errors.title) {
                        $(".titleerr").css({"display": "block"})
                        $(".titleerr").html(myerr.errors.title)
                    }
                    $(".success").css({"display": "none"})

                }
            });
        })
    })


</script>
</html>
