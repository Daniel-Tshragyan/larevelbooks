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
        $book = Books::find($request->input('id'));
        $authors = $book->authors->pluck('id','name')->toArray();
        return view('Book',['book' => $book, 'authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Books $books, Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'authors' => ['required']
        ]);
        $id = $books->insertGetId(
            ['title' => $request->input('title')]
        );
        $arr=[];
        foreach($request->input('authors') as $author){
            $arr[] =[
                'book_id' => $id,
                'author_id' =>$author
            ];
        }
        DB::table('book_authors')->insert($arr);
        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books, Request $request)
    {
        $book = $books::find($request->input('id'));

        $authors = Authors::all();

        $myauthors = $book->authors->pluck('id','name')->toArray();
        return view('changeBook',['book' => $book, 'authors' => $authors, 'belongs' => $myauthors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $books)
    {
        $request->validate([
            'title' => ['required'],
            'authors' => ['required']
        ]);

        $arr=[];
        foreach($request->input('authors') as $author){
            $arr[] =[
                'book_id' => $request->input('id'),
                'author_id' =>$author
            ];
        }
        DB::table('book_authors')->where('book_id', $request->input('id'))->delete();
        DB::table('book_authors')->insert($arr);
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $books, Request $req)
    {
        $books::where('id', $req->input('id'))->delete();
        Session::flash('message', 'Book Deleted');
        return redirect('/');

    }
}
