<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PharIo\Manifest\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $author = Authors::find($request->input('id'));
        $books = my_books($author);
        return view('Author',['author' => $author, 'books' =>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Authors $author, Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $author->name = $request->input('name');
        $author->save();
        Session::flash('message', 'Author Added');
        return redirect('addAutor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Authors $authors
     * @return \Illuminate\Http\Response
     */
    public function show(Authors $authors)
    {
        $authors = Authors::all();
        return view('createBook',['authors' => $authors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Authors $authors
     * @return \Illuminate\Http\Response
     */
    public function edit(Authors $authors, Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $author = $authors::find($request->input('id'));
        $author->name = $request->input('name');
        $author->save();
        Session::flash('message', 'Author Changed');
        return view('changeUthor', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Authors $authors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Authors $authors)
    {
        $author = $authors::find($request->input('id'));
        return view('changeUthor', ['author' => $author]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Authors $authors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Authors $authors, Request $req)
    {
        $authors::where('id', $req->input('id'))->delete();
        Session::flash('message', 'Author Deleted');
        return redirect('/');
    }
}
