<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class HomeController extends Controller
{
    public function index()
    {
        $catalog = Book::all();
        // $posts = book::orderBy('id','asc')->paginate(3);
        // return view('home.index', compact('catalog'));
        return view('home.index',[
            "title" => 'Home',
            "catalog" => $catalog
        ]);
    }

    public function detail($id)
    {
        $catalog = Book::where('id', $id)->first();

        return view('home.detail', ['catalog' => $catalog]);
    }

    public function login()
    {
        return view('home.login',[
            "title" => 'Login'
        ]);
    }

    public function about()
    {
        return view('home.about',[
            "title" => 'About'
        ]);
    }

    public function contactus()
    {
        return view('home.contactus',[
            "title" => 'Contactus'
        ]);
    }
    public function __construct()
    {
        $this->middleware('guest');
    }
}
