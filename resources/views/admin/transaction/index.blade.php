@extends('layout.main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                            <div>
                                <a class="btn btn-success mt-3" href="{{ route('print_transactions') }}"
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
                                            <th scope="col">fine</th>
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
