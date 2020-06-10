<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use Storage;
use App\Order;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    /**
     * Admin shows all books
     */
    public function books()
    {
        $books = Books::all();
        return view('adminBooks')->with(compact('books'));
    }
    /**
     * Admin book detail to edit
     */
    public function bookDetail(Books $book)
    {
        return view('bookEdit')->with(compact('book'));
    }
    /**
     * Admin delete book
     */
    public function bookDelete(Books $book)
    {
        if ($book->order()->count() > 0) 
        {
            return redirect()->route('adminbooks')->with('error', 'Knihu nelze smazat!');
        } else 
        {
            $book->delete();

            return redirect()->route('adminbooks')->with('success', 'Kniha byla odstraněna!');
        }
    }
    /**
     * Admin show form for creating book
     */
    public function bookCreate()
    {
        return view('bookCreate');
    }
    /**
     * Admin store book
     */
    public function bookStore(Request $request)
    {
        $validatedData = $request->validate([
            'author' => 'required|string|max:50',
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:1',
            'genre' => 'required|string|max:30',
            'language' => 'required|string|max:40',
            'published_in' => 'required|integer|min:1447|max:2019'
        ]);
        $request->validate([
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('public');

        $book = Books::create($validatedData);
        $book->image = $path;
        $book->save();


        return redirect()->route('adminbooks')->with('success', 'Kniha byla přidána!');
    }
    /**
     * Admin edit book
     */
    public function bookEdit(Request $request, Books $book)
    {
        $validatedData = $request->validate([
            'author' => 'required|string|max:50',
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:1',
            'genre' => 'required|string|max:30',
            'language' => 'required|string|max:40',
            'published_in' => 'required|integer|min:1447|max:2019'
        ]);
        $book->fill($validatedData);
        $request->validate([
            'image' => 'nullable|image'
        ]);
        if (!empty($request->file('image'))) {
            $path = $request->file('image')->store('public');
            Storage::delete($book->image);
            $book->image = $path;
        }
        $book->save();

        return redirect()->route('adminbook', $book->id)->with('success', 'Kniha byla upravena!');
    }
    /**
     * Showing all orders to admin
     */
    public function orders()
    {
        $orders = Order::orderBy('id', 'desc')->get();

        return view('orders')->with(compact('orders'));
    }
    /**
     * Deleting order
     */
    public function orderDelete(Order $order)
    {
        $order->books()->detach();
        $order->delete();

        return redirect()->route('adminorders')->with('success', 'Objednávka smazána');
    }
    public function orderStatus(Order $order)
    {
        if ($order->status == 'Objednáno') {
            $order->status = 'Na cestě';
        } elseif ($order->status == 'Na cestě') {
            $order->status = 'Doručeno';
        }
        $order->save();
        return redirect()->route('adminorders')->with('success', 'Stav byl pozměněn');
    }
}
