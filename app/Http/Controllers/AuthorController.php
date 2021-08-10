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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createAuthor');
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
            'name' => ['required']
        ]);
        $author = new Authors();
        $author->fill(['name' => $request->input('name')]);
        $author->save();
        Session::flash('message', 'Author Added');
        return redirect('author/create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Authors $authors
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Authors $author)
    {
        return view('Author', ['author' => $author]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Authors $authors
     * @return \Illuminate\Http\Response
     */
    public function edit(Authors $author)
    {
        return view('changeUthor', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Authors $authors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Authors $author)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $author->fill(['name' => $request->input('name')]);
        $author->save();
        Session::flash('message', 'Author Changed');
        return redirect("author/{$author->id}/edit");
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
