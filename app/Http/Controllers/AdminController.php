<?php

namespace App\Http\Controllers;
use App\Models\BookBorrow_transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $datas = DB::table('users')->where('is_admin',0)->count();
        $datab = DB::table('book')->count();
        $datat = DB::table('borrow_transaction')->count();
        // opsional yang datat menunggu table yang digunakan untuk menaruh data transaksu baru bisa dihitung
        return view('admin.dashboard', [
            "title" => 'Dashboard',
            "datas" => $datas,
            "datab" => $datab,
            "datat" => $datat
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
