<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $catalog = Book::all();
        return view('studentDashboard.dashboard', [
            "title" => 'Dashboard',
            "catalog" => $catalog
        ]);
    }

    public function show($id)
    {
        $catalog = Book::where('id', $id)->first();

        return view('studentDashboard.show', ['catalog' => $catalog]);
    }

    public function cart()
    {
        return view('studentDashboard.cart', [
            "title" => 'Cart'
        ]);
    }

    public function account()
    {
        return view('studentDashboard.account', [
            "title" => 'Account'
        ]);
    }
}
