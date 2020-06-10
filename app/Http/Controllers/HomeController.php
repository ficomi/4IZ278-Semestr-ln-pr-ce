<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        $books = Books::all();
        $header = "Naše nabídka";
        return view('home')->with(compact('books', 'header'));
    }
    public function kids()
    {
        $books = Books::where('genre', 'Dětské')->get();
        $header = "Dětská literatura";
        return view('home')->with(compact('books', 'header'));
    }
    public function beletrie()
    {
        $books = Books::where('genre', 'Beletrie')->get();
        $header = "Beletrie";
        return view('home')->with(compact('books', 'header'));
    }
    public function detective()
    {
        $books = Books::where('genre', 'Detektivka')->get();
        $header = "Detektivky";
        return view('home')->with(compact('books', 'header'));
    }
    public function fantasy()
    {
        $books = Books::where('genre', 'Fantasy a Sci-fi')->get();
        $header = "Fantasy a Sci-fi";
        return view('home')->with(compact('books', 'header'));
    }
    public function edu()
    {
        $books = Books::where('genre', 'Populárně naučné')->get();
        $header = "Populárně naučné";
        return view('home')->with(compact('books', 'header'));
    }
    public function other()
    {
        $notIn = ['Dětské', 'Beletrie', 'Detektivka', 'Fantasy a Sci-fi', 'Populárně naučné'];
        $books = Books::whereNotIn('genre', $notIn)->get();
        $header = "Ostatní žánry";
        return view('home')->with(compact('books', 'header'));
    }
    public function privacy()
    {
        return view('privacy');
    }
}