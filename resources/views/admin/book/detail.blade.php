@extends('admin.book.mainlayout')
@section('title', 'Book Information')
@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center mt-3">
                            @php
                            $pathImage = '';
                            $Book->photo ? ($pathImage = 'storage/' . $Book->photo) : ($pathImage = 'picture/empty.png');
                            @endphp
                            <img src="{{ asset('' . $pathImage . '') }}" width="200" alt="">
                            <!-- <ul>
                            <li class="list-group-item mt-3"><b>Description: </b>
                            <div>{{$Book->description}}</div></li>
                            </ul> -->
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Title: </b>{{$Book->title}}</li>
                                <li class="list-group-item"><b>Year Publish: </b>{{$Book->year}}</li>
                                <li class="list-group-item"><b>Status: </b>{{$Book->status}}</li>
                                <li class="list-group-item"><b>Stock: </b>{{$Book->stock}}</li>
                                <li class="list-group-item"><b>Author: </b>{{$Book->author}}</li>
                                <li class="list-group-item"><b>Status: </b>{{$Book->status}}</li>
                                <li class="list-group-item"><b>ISBN/ISSN: </b>{{$Book->isbn_issn}}</li>
                                <li class="list-group-item"><b>Type: </b>{{$Book->type->name}}</li>
                                <li class="list-group-item"><b>Publisher: </b>{{$Book->publisher->name}}</li>
                                <li class="list-group-item"><b>Description: </b>{{$Book->description}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3 mb-3">
                    <a class="btn btn-success mt-3" href="{{ route('book.index') }}">Back</a>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection