<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use DB;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function index()
    {
        return view('home.index', [
            "title" => "pasta",
            "Book" => Book::all()
        ]);
    }
}
