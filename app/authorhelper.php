<?php
if (!function_exists('my_books')) {
    function my_books($author)
    {
        return view('authorbooks',['books' => $author->books->pluck('id','title')->toArray()]);
    }
}
