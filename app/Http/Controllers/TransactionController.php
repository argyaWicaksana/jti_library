<?php

namespace App\Http\Controllers;

use App\Models\Borrow_transaction;
use App\Models\Return_transaction;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $trans = Borrow_transaction::orderBy('created_at', 'desc')->paginate(3);
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
        $books = $trans->books;

        return view('admin.transaction.detail', compact('books'));
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
            'status_id' => ['required', 'integer'],
            'fine_paid' => ['boolean'],
        ];

        $data = $request->validate($rules);
        $borrow_tranc = Borrow_transaction::where('id', $id)->first();

        if ($data['status_id'] == 4 && $borrow_tranc->status_id != 4) {
            $data['actual_return'] = Carbon::now()->toDateTimeString();
            // $data['actual_return'] = '2023-06-17';

            // check if deserve fine
            $returnDate = Carbon::parse($borrow_tranc->date_returndata);
            $actualReturn = Carbon::parse($data['actual_return']);
            $diffDate = $returnDate->diffInDays($actualReturn, false);
            $data['fine_paid'] = $diffDate > 0 ? false : null;

            $borrowed_books = $borrow_tranc->books;

            // update amount book
            foreach ($borrowed_books as $book) {
                $book->stock += $book->pivot->number_book_borrow;
                $book->update();
            }
        }

        if ($data['status_id'] == 3) {
            $data['actual_return'] = null;
            $data['fine_paid'] = null;
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

        $trans = Borrow_transaction::Where('user_id', $keyword)
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
