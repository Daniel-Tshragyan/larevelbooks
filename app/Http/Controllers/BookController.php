<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Books $book)
    {
        $authors = Authors::all();
        return view('createBook', ['authors' => $authors]);

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
        $books = new Books();
        $books->fill(['title' => $request->input('title')]);
        $books->save();
        $books->authors()->attach($request->input('authors'));
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $book)
    {
        $authors = $book->authors->pluck('id', 'name')->toArray();
        return view('Book', ['book' => $book, 'authors' => $authors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $book)
    {
        $authors = Authors::all();
        $myauthors = $book->authors->pluck('id', 'name')->toArray();
        return view('changeBook', ['book' => $book, 'authors' => $authors, 'belongs' => $myauthors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $book)
    {
        $request->validate([
            'title' => ['required'],
            'authors' => ['required']
        ]);
        $book->update(['title' => $request->input('title')]);
        $book->authors()->sync($request->input('authors'));
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, Books $book)
    {
        $book->where('id', $req->input('id'))->delete();
        Session::flash('message', 'Book Deleted');
        return redirect('/');

    }
}
