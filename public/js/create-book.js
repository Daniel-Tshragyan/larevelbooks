$(document).ready(function () {
    $(".authors").select2()
    $(".cons").click(() => {
        var token = $(".token").val()
        var authors = $(".authors").val()
        var title = $(".title").val()
        $.ajax({
            url: "/book",
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
