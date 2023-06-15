@extends('layout.main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                            <form class="nav nav-tabs align-items-baseline gap-3" role="tablist">
                                <div class="nav-item">
                                    <select name="order_by" class="form-select" aria-label="Default select example">
                                        <option selected value="">Order By</option>
                                        <option value="popular">Popularity</option>
                                        <option value="new">Newest</option>
                                    </select>
                                </div>
                                <div class="nav-item">
                                    <div class="search-form">
                                        <i class="icon-search"></i>
                                        <input name="search" class="form-control" placeholder="Search Title"
                                            title="Search here">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Filter</button>
                            </form>
                            <div>
                                <a class="btn btn-success mt-3" href="{{ route('print_books') }}" target="_blank">Print</a>
                            </div>
                        </div>
                        <div class="float-right my-2">
                            <a class="btn btn-success" href="{{ route('book.create') }}"> Input Book Data</a>
                        </div>
                        <div class="card card-dashboard">
                            <div class="card-body text-center">
                                <h5 class="card-title">The List of Book</h5>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
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
                                                <td>{{ $bk->title }}</td>
                                                <td>
                                                    @php
                                                        $pathImage = '';
                                                        $bk->photo ? ($pathImage = 'storage/' . $bk->photo) : ($pathImage = 'picture/empty.png');
                                                    @endphp
                                                    <img src="{{ asset('' . $pathImage . '') }}" width="100"
                                                        alt="">
                                                </td>
                                                <td>{{ $bk->status }}</td>
                                                <td>{{ $bk->stock }}</td>
                                                <td>{{ $bk->isbn_issn }}</td>
                                                <td>{{ $bk->type->name }}</td>
                                                <td>{{ $bk->publisher->name }}</td>
                                                <td>
                                                    <form action="{{ route('book.destroy', ['book' => $bk->id]) }}"
                                                        method="POST">
                                                        <a class="btn btn-info"
                                                            href="{{ route('book.show', $bk->id) }}">Show</a>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('book.edit', $bk->id) }}">Edit</a>
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
                                    {{ $book->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        @endsection
