@extends('admin.transaction.mainlayout')

@section('title', 'Transaction Information')

@section('content')
    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card card-dashboard">
                    <div class="card-body text-center">
                        <h4 class="card-title">List of Borrowed Books</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Cover</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->photo ?? '-' }}</td>
                                        <td>{{ $book->pivot->number_book_borrow }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
