<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sorts = ['id'=>'id','title'=>'title'];
        $order_by = 'id';
        $how = 'asc';
        if ($request->input("order_by")) {
            $order_by = $request->input('order_by');
        }

        if ($request->input('how')) {
            $how = $request->input('how');
        }

        $book = Book::orderBy($order_by, $how)->paginate(3);
        $book->withPath("book?order_by={$order_by}&&how={$how}");
        return view('book.index', ['books' => $book,'sorts'=>$sorts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Book $book)
    {
        $authors = Author::all();
        return view('book.create', ['authors' => $authors]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'authors' => ['required']
        ]);
        $book = new Book();
        $book->fill(['title' => $request->input('title')]);
        $book->save();
        $book->authors()->attach($request->input('authors'));
        Session::flash('message', 'book Added');
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $authors = $book->authors->pluck('id', 'name')->toArray();
        return view('book.show', ['book' => $book, 'authors' => $authors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $belongauthors = $book->authors->pluck('id', 'name')->toArray();
        return view('book.update', ['book' => $book, 'authors' => $authors, 'belongs' => $belongauthors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => ['required'],
            'authors' => ['required']
        ]);
        $book->update(['title' => $request->input('title')]);
        $book->authors()->sync($request->input('authors'));
        Session::flash('message', 'book changed');
        return redirect()->route('book.edit',['book' => $book]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, Book $book)
    {
        $book->delete();
        Session::flash('message', 'Book Deleted');
        return redirect('/');

    }
}
