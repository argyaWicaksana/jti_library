@extends('layout.main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <form action="{{ route('transaction.index') }}" class="d-flex align-items-baseline gap-3">
                                <select name="fine_status" class="form-select" aria-label="Default select example">
                                    <option selected value="">Fine Status</option>
                                    <option value="1">Paid</option>
                                    <option value="0">Unpaid</option>
                                </select>
                                <select name="book_status" class="form-select" aria-label="Default select example">
                                    <option selected value="">Book Status</option>
                                    <option value="1">On Process</option>
                                    <option value="2">Booked</option>
                                    <option value="3">Borrowed</option>
                                    <option value="4">Returned</option>
                                </select>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                            <div>
                                <a class="btn btn-success" href="{{ route('print_transactions') }}"
                                    target="_blank">Print</a>
                            </div>
                        </div>

                        <div class="card card-dashboard">
                            <div class="card-body text-center">
                                <h4 class="card-title">The List of Transaction</h4>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date Borrow</th>
                                            <th scope="col">Date Return</th>
                                            <th scope="col">Actual Return</th>
                                            <th scope="col">Fine</th>
                                            <th scope="col">Fine Status</th>
                                            <th scope="col">Status</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trans as $trs)
                                            <tr>
                                                <td>{{ $trs->user_id }}</td>
                                                <td>{{ $trs->amount }}</td>
                                                <td>{{ $trs->date_borrow }}</td>
                                                <td>{{ $trs->date_returndata }}</td>
                                                <td>{{ $trs->actual_return ?? '-' }}</td>
                                                @php
                                                    if ($trs->actual_return) {
                                                        // menghitung denda
                                                        $returnDate = Carbon\Carbon::parse($trs->date_returndata);
                                                        $actualReturn = Carbon\Carbon::parse($trs->actual_return);
                                                        $diffDate = $returnDate->diffInDays($actualReturn, false);
                                                        $fine = $diffDate > 0 ? abs($diffDate) * 10000 : 0;
                                                    }
                                                @endphp
                                                <td>{{ $fine ?? '-' }}</td>
                                                @if (!is_null($trs->fine_paid))
                                                    <td>{{ $trs->fine_paid ? 'Paid' : 'Unpaid' }}</td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                                <td>{{ $trs->status->name }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('transaction.destroy', ['transaction' => $trs->id]) }}"
                                                        method="POST">
                                                        <a class="btn btn-info"
                                                            href="{{ route('transaction.show', $trs->id) }}">Show</a>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('transaction.edit', $trs->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $trans->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        @endsection
