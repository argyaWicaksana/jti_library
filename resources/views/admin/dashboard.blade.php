@extends('layout.main')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="card card-dashboard">
                        <div class="card-body text-center">
                            <h4 class="card-title">LIBRARY INFORMATION</h4>
                            <div class="container">

                                <div class="row row-dashboard">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <div>
                                                <h3 class="">Total Student</h3>
                                            </div>
                                            <span class="text-muted" style="font-size: 20px; font-weight: 700;">{{ $datas }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between mt-2">
                                            <div>
                                                <h3 class="">Total Book</h3>
                                            </div>
                                            <span class="text-muted" style="font-size: 20px; font-weight: 700;">{{ $datab }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between mt-2">
                                            <div>
                                                <h3 class="">Total Transaction</h3>
                                            </div>
                                            <span class="text-muted" style="font-size: 20px; font-weight: 700;">{{ $datat }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            @endsection