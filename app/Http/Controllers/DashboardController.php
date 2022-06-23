<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookBorrow_transaction;
use App\Models\Borrow_transaction;
use Illuminate\Support\Facades\Auth;

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

    public function borrow(Request $request, $id)
    {
        $book = Book::where('id', $id)->first();

        if($request->amount > $book->stock)
        {
            return redirect('detail/'.$id);
        }

        $cek_borrow = Borrow_transaction::where('user_id', Auth::user()->id)->first();
        if(empty($cek_borrow))
        {
            $borrow_transaction = new Borrow_transaction;
            $borrow_transaction->user_id = Auth::user()->id;
            $borrow_transaction->book_id = $book->id;
            $borrow_transaction->amount = $request->amount;
            $borrow_transaction->save();
        }
        else
        {
            $borrow_transaction = Borrow_transaction::where('user_id', Auth::user()->id)->first();

            $borrow_transaction->user_id = Auth::user()->id;
            $borrow_transaction->book_id = $book->id;
            $borrow_transaction->amount =  $borrow_transaction->amount+$request->amount;
            $borrow_transaction->update();

        }

        $borrow = Borrow_transaction::where('user_id', Auth::user()->id)->first();

        $cek_book_borrow = BookBorrow_transaction::where('book_id', $book->id)->where('borrow_transaction_id', $borrow->id)->first();
        if(empty($cek_book_borrow))
        {
            $book_borrow = new BookBorrow_transaction;
            $book_borrow->book_id = $book->id;
            $book_borrow->borrow_transaction_id = $borrow->id;
            $book_borrow->number_book_borrow = $request->amount;
            $book_borrow->save();
        }
        else
        {
            $book_borrow = BookBorrow_transaction::where('book_id', $book->id)->where('borrow_transaction_id', $borrow->id)->first();

            $book_borrow->number_book_borrow = $book_borrow->number_book_borrow+$request->amount;
            $book_borrow->update();

        }

        return redirect('/studentdashboard');

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
