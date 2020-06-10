<?php

namespace App\Http\Controllers;

use App\Books;
use App\Shoppingcart;
use Illuminate\Http\Request;

class ShoppingcartController extends Controller
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
        $shoppingcart = auth()->user()->shoppingcart;
        $cartBook = $shoppingcart->books()->find($book->id);
        if (empty($cartBook)) {
            $count = 1;
        } else {
            $count = $cartBook->pivot->count;
            $count++;           
        }
        $shoppingcart->books()->syncWithoutDetaching([$book->id => ['count' => $count]]);

        return redirect()->route('singlebook', $book->id)->with('success', 'Kniha přídána do košíku.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shoppingcart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $shoppingcart = auth()->user()->shoppingcart;
        $books = $shoppingcart->books;

        return view('shoppingcart')->with(compact('books'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shoppingcart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $book)
    {
        $shoppingcart = auth()->user()->shoppingCart;
        $shoppingcart->books()->detach($book->id);

        return redirect()->route('shoppingcartshow');
    }
}
