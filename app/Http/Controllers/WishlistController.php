<?php

namespace App\Http\Controllers;

use App\Books;
use App\wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Books $book)
    {
        $wishlist = auth()->user()->wishlist;
        $wishBook = $wishlist->books()->find($book->id);
        if (empty($wishBook)) {
            $count = 1;
        } else {
            $count = $wishBook->pivot->count;
            $count++;           
        }
        $wishlist->books()->syncWithoutDetaching([$book->id => ['count' => $count]]);

        return redirect()->route('singlebook', $book->id)->with('success', 'Kniha přídána do Wishlistu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $wishlist = auth()->user()->wishlist;
        $books = $wishlist->books;

        return view('wishlist')->with(compact('books'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $book)
    {
        $wishlist = auth()->user()->wishlist;
        $wishlist->books()->detach($book->id);

        return redirect()->route('wishlistshow');
    }
}
