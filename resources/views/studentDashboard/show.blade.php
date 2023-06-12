@extends('studentDashboard.layout.main')

@section('content')
    <main role="main" class="container mt-5">
        <div class="row">
            <div class="col-md-1 mt-5">
                <a href="/studentdashboard">
                    <i class="bi bi-arrow-left" style="font-size: 3rem;"></i>
                </a>
            </div>
            <div class="col-md-5 mt-5">
                @php
                $pathImage = '';
                $catalog->photo ? ($pathImage = 'storage/' . $catalog->photo) : ($pathImage = 'picture/empty.png');
                @endphp
                <img src="{{ asset('' . $pathImage . '') }}" class="img-fluid float-end img-book" alt="">
            </div>
            <div class="col-md-6 mt-5">
                <h5 class="mt-2 title">{{ $catalog->title }}</h5>
                <div class="desc"><b>Year Publish: </b>{{$catalog->year}}</div>
                <div class="desc"><b>Stock: </b>{{$catalog->stock}}</div>
                <div class="desc"><b>Author: </b>{{$catalog->author}}</div>
                <div class="desc"><b>Status: </b>{{$catalog->status}}</div>
                <div class="desc"><b>ISBN/ISSN: </b>{{$catalog->isbn_issn}}</div>
                <div class="desc"><b>Type: </b>{{$catalog->type->name}}</div>
                <div class="desc"><b>Publisher: </b>{{$catalog->publisher->name}}</div>
                <div class="desc"><b>Description: </b>{{$catalog->description}}</div>
                <form action="{{ route('studentDashboard.borrow', $catalog->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 amount">
                            <b>Amount :</b>
                        </div>
                        <div class="col-md-2 text-start">
                            <input class="form-control input-amount" type="text" name="number_book_borrow" required>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" role="button" type="submit">Add to Cart</button>
                </form>
            </div>
        </div>

    </main>
@endsection
