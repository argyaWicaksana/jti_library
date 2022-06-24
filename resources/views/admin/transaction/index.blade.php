@extends('layout.main')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <form class="search-form" action="{{ url('search') }}">
                                    <i class="icon-search"></i>
                                    <input type="search" name="search" class="form-control" placeholder="Search Here" title="Search here">
                                </form>
                            </li>

                        </ul>
                        <div>
                            <a class="btn btn-success mt-3" href="{{ route('print_student') }}" target="_blank">Print</a>
                        </div>
                    </div>

                    <div class="card card-dashboard">
                        <div class="card-body text-center">
                            <h4 class="card-title">The List of Transaction</h4>
                            @if ($message = Session::get('success'))<div class="alert alert-success">
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
                                        <th scope="col">Status</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trans as $trs)
                                    <tr>
                                        <td>{{ $trs ->users_id }}</td>
                                        <td>{{ $trs ->amount }}</td>
                                        <td>{{ $trs ->date_borrow }}</td>
                                        <td>{{ $trs ->date_returndata }}</td>
                                        <td>{{ $trs ->status }}</td>
                                        <td>
                                            <form action="{{ route('transaction.destroy',['transaction'=>$trs->id]) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('transaction.show',$trs->id) }}">Show</a>
                                                <a class="btn btn-primary" href="{{ route('transaction.edit',$trs->id) }}">Edit</a>
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
                                {{ $trans->links()}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        @endsection