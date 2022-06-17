@extends('admin.student.mainlayout')
@section('title', 'Add Student')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="card col-lg-6">
            <div class="card-title text-center mt-4">
                <h5>Add New Student Data</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('student.store') }}" id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="Name" class="form-control" id="Name" name="Name">
                    </div>
                    <div class="mb-3">
                        <label for="Nim" class="form-label">Nim</label>
                        <input type="Nim" class="form-control" id="Nim" name="Nim">
                    </div>
                    <div class="mb-3">
                        <label for="Profile_picture" class="form-label">Profile picture</label>
                        <input class="form-control" type="file" id="Profile_picture" name="Profile_picture">
                    </div>
                    <div class="mb-3">
                        <label for="Ktm_picture" class="form-label">KTM picture</label>
                        <input class="form-control" type="file" id="Ktm_picture" name="Ktm_picture">
                    </div>
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="Username" class="form-control" id="Username" name="Username">
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="Password" class="form-control" id="Password" name="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection