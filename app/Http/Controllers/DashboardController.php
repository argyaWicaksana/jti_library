<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('studentDashboard.dashboard', [
            "title" => 'Dashboard'
        ]);
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
