<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
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

        if ($request->number_book_borrow > $book->stock) {
            return redirect('detail/' . $id);
        }

        $cek_borrow = Borrow_transaction::where('users_id', Auth::user()->id)->first();
        if (empty($cek_borrow)) {
            $borrow_transaction = new Borrow_transaction;
            $borrow_transaction->users_id = Auth::user()->id;
            $borrow_transaction->amount = $request->number_book_borrow;
            $borrow_transaction->save();
        } else {
            $borrow_transaction = Borrow_transaction::where('users_id', Auth::user()->id)->first();

            $borrow_transaction->users_id = Auth::user()->id;
            $borrow_transaction->amount =  $borrow_transaction->amount + $request->number_book_borrow;
            $borrow_transaction->update();
        }

        $borrow = Borrow_transaction::where('users_id', Auth::user()->id)->first();

        $cek_book_borrow = BookBorrow_transaction::where('book_id', $book->id)->where('borrow_transaction_id', $borrow->id)->first();
        if (empty($cek_book_borrow)) {
            $book_borrow = new BookBorrow_transaction;
            $book_borrow->book_id = $book->id;
            $book_borrow->borrow_transaction_id = $borrow->id;
            $book_borrow->number_book_borrow = $request->number_book_borrow;
            $book_borrow->save();
        } else {
            $book_borrow = BookBorrow_transaction::where('book_id', $book->id)->where('borrow_transaction_id', $borrow->id)->first();

            $book_borrow->number_book_borrow = $book_borrow->number_book_borrow + $request->number_book_borrow;
            $book_borrow->update();
        }

        return redirect('/studentdashboard');
    }

    public function cart()
    {
        $cart = Borrow_transaction::all();
        $borrow = BookBorrow_transaction::all();
        return view('studentDashboard.cart', [
            "title" => 'Cart',
            "cart" => $cart,
            "borrow" => $borrow
        ]);
    }

    public function destroy($id)
    {
        $book_borrow = BookBorrow_transaction::where('id', $id)->first();

        $borrow = Borrow_transaction::where('id', $book_borrow->borrow_transaction_id)->first();
        $borrow->amount = $borrow->amount - $book_borrow->number_book_borrow;
        $borrow->update();

        $book_borrow->delete();
        return redirect('/cart');
    }

    public function update(Request $request, $id)
    {
        $book_borrow = Borrow_transaction::where('id', $id)->first();
        $book_borrow->date_borrow = $request->date_borrow;
        $book_borrow->date_returndata = $request->date_returndata;
        $book_borrow->save();
        
        // $rules = [
        //     'date_borrow' => ['required'],
        //     'date_returndata' => ['required'],
        // ];

        // $data = $request->validate($rules);

        // Borrow_transaction::where('id', $id)
        //     ->update($book_borrow);

        //if the data successfully updated, will return to main page
        return redirect()->route('/studentdashboard');
    }

    public function checkout()
    {
    }

    public function account()
    {
        return view('studentDashboard.account', [
            "title" => 'Account'
        ]);
    }
}
