<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.student.dashboard', [
            "title" => 'Dashboard'
        ]);
    }

    public function cart()
    {
        return view('dashboard.student.cart', [
            "title" => 'Cart'
        ]);
    }

    public function account()
    {
        return view('dashboard.student.account', [
            "title" => 'Account'
        ]);
    }
}
