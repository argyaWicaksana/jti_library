@extends('admin.student.mainlayout')
@section('title', 'Student Information')
@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            @php
                            $pathImage = '';
                            $Student->profile_picture ? ($pathImage = 'storage/' . $Student->profile_picture) : ($pathImage = 'picture/empty.png');
                            @endphp
                            <img src="{{ asset('' . $pathImage . '') }}" width="200" alt="">
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Name: </b>{{$Student->name}}</li>
                                <li class="list-group-item"><b>Nim: </b>{{$Student->nim}}</li>
                                <li class="list-group-item"><b>Username: </b>{{$Student->username}}</li>
                                <li class="list-group-item"><b>KTM: </b>
                                    <div class="mt-3">
                                        @php
                                        $pathImage = '';
                                        $Student->ktm_picture ? ($pathImage = 'storage/' . $Student->ktm_picture) : ($pathImage = 'picture/empty.png');
                                        @endphp
                                        <img src="{{ asset('' . $pathImage . '') }}" width="100" alt="">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3 mb-3">
                    <a class="btn btn-success mt-3" href="{{ route('student.index') }}">Back</a>
                    <a class="btn btn-success mt-3" href="{{ route('print_student', $Student->id) }}">Print</a>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection