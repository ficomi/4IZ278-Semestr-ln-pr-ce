<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->order;

        return view('orders')->with(compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orderCreate');
    }
    public function updateCount(Request $request)
    {
        $shoppingcart = auth()->user()->shoppingcart;
        if (empty($shoppingcart)) {
            return redirect()->route('home');
        }
        $books = $shoppingcart->books;
        foreach ($books as $book) {
            $request->validate(['count' . $book->id => 'required|integer|min:1']);
            $shoppingcart->books()->updateExistingPivot($book->id, ['count' => $request->input('count' . $book->id)]);
        }
        return redirect()->route('ordercreate');
    }
    public function confirm(Request $request)
    {
        $user = auth()->user();
        $shoppingcart = $user->shoppingcart;
        $cartBooks = $shoppingcart->books;
        if (count($cartBooks) < 1) {
            return redirect()->route('home')->with('error', 'Váš košík je prázdný');
        }

        $validatedData = $request->validate([
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'street' => 'required|string|max:100',
            'postal_code' => 'numeric|required|digits:5',
            'phone_number' => 'required|phone',
        ]);
        $order = $user->order()->make($validatedData);
        $price = 0;
        foreach ($cartBooks as $cartBook) {
            $bookCount = $cartBook->pivot->count;
            $price += $cartBook->price * $bookCount;
        }
        $order->price = $price;
        $request->session()->put('order', $order);

        return view('orderConfirm')->with(compact('cartBooks', 'order'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = $request->session()->get('order');
        if (empty($order)) {
            return redirect()->route('home')->with('error', 'Něco se porouchalo.');
        }
        $order->save();
        $user = auth()->user();
        $shoppingcart = $user->shoppingcart;
        $cartBooks = $shoppingcart->books;
        foreach ($cartBooks as $cartBook) {
            $bookCount = $cartBook->pivot->count;
            $order->books()->attach($cartBook->id, ['count' => $bookCount]);
        }
        $shoppingcart->books()->detach();
        $request->session()->forget('order');

        return redirect()->route('ordershow', $order->id)->with('success', 'Objednávka proběhla úspěšně.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if (($order->user->id != auth()->user()->id) && !auth()->user()->isAdmin()) {
            return redirect()->route('home');
        } else {
            $books = $order->books;
            return view('orderDetail')->with(compact('books', 'order'));
        }
    }
}
