<?php

namespace App\Http\Controllers;

use App\Models\Borrow_transaction;
use App\Models\Return_transaction;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trans = Borrow_transaction::paginate(3);
        // $posts = Student::orderBy('id','asc')->paginate(3);
        return view('admin.transaction.index', compact('trans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trans = Borrow_transaction::where('id', $id)->first();

        return view('admin.transaction.detail', ['trans' => $trans]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trans = Borrow_transaction::where('id', $id)->first();
        $status = Status::all();
        // $user = User::all();
        return view('admin.transaction.edit', compact('trans', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'status_id' => ['required'],
        ];

        $data = $request->validate($rules);
        $borrow_tranc = Borrow_transaction::where('id', $id)->first();

        if ($data['status_id'] == 4) {
            $borrowed_books = $borrow_tranc->books;

            // update jumlah buku
            foreach ($borrowed_books as $book) {
                $book->stock += $book->pivot->number_book_borrow;
                $book->update();
            }

            // create data di tabel return transaction
            $returnDate = Carbon::parse($borrow_tranc->date_returndata);
            $actualReturnDate = Carbon::now();
            $diffDate = $returnDate->diffInDays($actualReturnDate, false);
            // jika telat mengembalikan, denda 10rb per hari
            $fine = $diffDate < 0 ? abs($diffDate) * 10000 : 0;

            Return_transaction::create([
                'fine' => $fine,
                'borrow_transaction_id' => $id,
                'date_returnday' => $actualReturnDate->toDateTimeString()
            ]);
        }

        $borrow_tranc->update($data);

        //if the data successfully updated, will return to main page
        return redirect()->route('transaction.index')
            ->with('success', 'Transaction Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trans = Borrow_transaction::find($id);

        $trans->bookborrow_transaction()->delete();

        $trans->delete();
        return redirect()->route('transaction.index')
            ->with('success', 'Transaction Successfully Deleted');
    }
    public function search(Request $request)
    {
        $keyword = $request->search;

        $trans = Borrow_transaction::Where('users_id', $keyword)
            ->orWhere('amount', $keyword)
            ->orWhere('date_borrow', 'like', "%" . $keyword . "%")
            ->orWhere('date_returndata', 'like', "%" . $keyword . "%")
            ->paginate(3);
        return view('admin.transaction.search', compact('trans'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
    }

    public function print_transactions()
    {
        //$student = User::where('id', $id)->first();

        $transactions = Borrow_transaction::all();
        // $pdf = PDF::loadview('print.student_pdf', ['student'=> $student]);
        $pdf = PDF::loadview('print.transactions_pdf', ['transactions' => $transactions]);
        return $pdf->stream('transactions.pdf');
    }
}
