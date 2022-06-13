<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.admin.dashboard', [
            "title" => 'Dashboard'
        ]);
    }
    public function books()
    {
        return view('dashboard.admin.books', [
            "title" => 'Books'
        ]);
    }
    public function student()
    {
        return view('dashboard.admin.student', [
            "title" => 'Student'
        ]);
    }
    public function transaction()
    {
        return view('dashboard.admin.transaction', [
            "title" => 'Transaction'
        ]);
    }
}
