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

                    <div class="float-right my-2">
                        <a class="btn btn-success" href="{{ route('student.create') }}"> Input Student Data</a>
                    </div>

                    <div class="card card-dashboard">
                        <div class="card-body text-center">
                            <h4 class="card-title">The List of Student</h4>
                            @if ($message = Session::get('success'))<div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Nim</th>
                                        <th scope="col">Profile_picture</th>
                                        <th scope="col">Ktm_Picture</th>
                                        <th scope="col">Username</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student as $mhs)
                                    <tr>
                                        <td>{{ $mhs ->name }}</td>
                                        <td>{{ $mhs ->nim }}</td>
                                        <td>
                                            @php
                                            $pathImage = '';
                                            $mhs->profile_picture ? ($pathImage = 'storage/' . $mhs->profile_picture) : ($pathImage = 'picture/empty.png');
                                            @endphp
                                            <img src="{{ asset('' . $pathImage . '') }}" width="100" alt="">
                                        </td>
                                        <td>
                                            @php
                                            $pathImage = '';
                                            $mhs->ktm_picture ? ($pathImage = 'storage/' . $mhs->ktm_picture) : ($pathImage = 'picture/empty.png');
                                            @endphp
                                            <img src="{{ asset('' . $pathImage . '') }}" width="100" alt="">
                                        </td>
                                        <td>{{ $mhs ->username }}</td>
                                        <td>
                                            <form action="{{ route('student.destroy',['student'=>$mhs->id]) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('student.show',$mhs->id) }}">Show</a>
                                                <a data-id="edit-student" class="btn btn-primary" href="{{ route('student.edit',$mhs->id) }}">Edit</a>
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
                                {{ $student->links()}}
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        @endsection