<?php
if (!function_exists('my_books')) {
    function my_books($author)
    {
        return "Hello {$author->name}";
    }
}
