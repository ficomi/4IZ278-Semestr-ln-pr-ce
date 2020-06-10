<?php

namespace App\Http\Controllers;

use App\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $book)
    {
        $similairbooks = Books::where([['genre', '=', $book->genre], ['id', '!=', $book->id]])->take(5)->get();
        return view('book')->with(compact('book', 'similairbooks'));
    }
}
