<?php

namespace App\Http\Controllers;
use App\Models\BookBorrow_transaction;
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
        $transaction = BookBorrow_transaction::paginate(3); // modelnya diganti disini
        return view('admin.transaction', [compact('transaction'),"title" => 'Transaction']);
    }
}
