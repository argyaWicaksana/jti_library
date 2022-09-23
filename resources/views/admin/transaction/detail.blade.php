@extends('admin.transaction.mainlayout')
@section('title', 'Transaction Information')
@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-header text-center">
                        <h3><strong>Transaction Detail</strong></h3>
                    </div>
                    <div class="row">

                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><b>User ID: </b>{{$trans->users_id}}</li>
                            <li class="list-group-item"><b>Book Amount: </b>{{$trans->amount}}</li>
                            <li class="list-group-item"><b>Date Borrow: </b>{{$trans->date_borrow}}</li>
                            <li class="list-group-item"><b>Date Return: </b>{{$trans->date_returndata}}</li>
                            <li class="list-group-item"><b>Status: </b>{{$trans->status->name}}</li>
                        </ul>

                    </div>
                </div>
                <div class="text-center mt-3 mb-3">
                    <a class="btn btn-success mt-3" href="{{ route('transaction.index') }}">Back</a>
                    {{-- <a class="btn btn-success mt-3" href="{{ route('/print_transaction', $trans->id) }}" target="_blank">Print</a> --}}
                </div>
            </div>

        </div>
    </div>

</div>
@endsection