<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            "title" => 'Dashboard'
        ]);
    }
    // public function books()
    // {
    //     return view('admin.books.index', [
    //         "title" => 'Books'
    //     ]);
    // }
    // public function student()
    // {
    //     return view('dashboard.admin.student.index', [
    //         "title" => 'Student'
    //     ]);
    // }
    public function transaction()
    {
        return view('admin.transaction', [
            "title" => 'Transaction'
        ]);
    }
}
