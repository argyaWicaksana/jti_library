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
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                            </li> -->
                            <li class="nav-item">
                                <form class="search-form" action="#">
                                    <i class="icon-search"></i>
                                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                                </form>
                            </li>

                        </ul>
                        <div>
                            <div class="btn-wrapper">
                                <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                            </div>
                        </div>
                    </div>
                    <div class="float-right my-2">
                        <a class="btn btn-success" href="{{ route('book.create') }}"> Input Book Data</a>
                    </div>
                    <div class="card card-dashboard">
                        <div class="card-body text-center">
                            <h5 class="card-title">The List of Book</h5>
                            @if ($message = Session::get('success'))<div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">ISBN/ISSN</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Publisher</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($book as $bk)
                                    <tr>
                                        <td>{{ $bk ->title }}</td>
                                        <td>
                                            @php
                                            $pathImage = '';
                                            $bk->photo ? ($pathImage = 'storage/' . $bk->photo) : ($pathImage = 'picture/empty.png');
                                            @endphp
                                            <img src="{{ asset('' . $pathImage . '') }}" width="100" alt="">
                                        </td>
                                        <td>{{ $bk ->status }}</td>
                                        <td>{{ $bk ->stock }}</td>
                                        <td>{{ $bk ->isbn_issn }}</td>
                                        <td>{{ $bk ->type->name }}</td>
                                        <td>{{ $bk ->publisher->name }}</td>
                                        <td>
                                            <form action="{{ route('book.destroy',['book'=>$bk->id]) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('book.show',$bk->id) }}">Show</a>
                                                <a class="btn btn-primary" href="{{ route('book.edit',$bk->id) }}">Edit</a>
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
                                {{ $book->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        @endsection