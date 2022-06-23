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
                                <a class="nav-link active mt-2" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success mt-3" style="margin-left: 10px;" href="{{ route('book.index') }}" target="_blank">Back</a>
                            </li>
                            <li class="nav-item">
                                <p style="font-size: 15px; margin-top: 20px;">{{ $book->total() }} Book Found</p>
                            </li>
                        </ul>
                        <div>
                            <a class="btn btn-success mt-3" href="{{ route('print_books') }}" target="_blank">Print</a>
                        </div>
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