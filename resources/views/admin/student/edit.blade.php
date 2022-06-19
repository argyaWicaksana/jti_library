@extends('admin.student.mainlayout')
@section('title', 'Edit Student')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="card col-lg-6">
            <div class="card-title text-center mt-4">
                <h5>Edit Student Data</h5>
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
                <form method="post" action="{{ route('student.update', $Student->id) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $Student->name }}" ariadescribedby="name">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">Nim</label>
                        <input type="text" name="nim" class="form-control" id="nim" value="{{ $Student->nim }}" ariadescribedby="nim">
                    </div>
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Profile picture</label>
                        <input type="hidden" name="oldProfile" value="{{ $Student->profile_picture }}">
                        @if($Student->profile_picture)
                        <img src="{{ asset ('storage/' . $Student->profile_picture) }}" class="profile-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                        <img class="profile-preview img-fluid mb-3 col-sm-5">
                        @endif
                        
                        <input class="form-control" type="file" id="profile_picture" name="profile_picture" onchange="previewImage()">
                        @error('profile_picture')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ktm_picture" class="form-label">KTM picture</label>
                        <input type="hidden" name="oldKtm" value="{{ $Student->ktm_picture }}">
                        @if($Student->ktm_picture)
                        <img src="{{ asset ('storage/' . $Student->ktm_picture) }}" class="ktm-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                        <img class="ktm-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input class="form-control" type="file" id="ktm_picture" name="ktm_picture" onchange="previewImageKtm()">
                        @error('ktm_picture')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" value="{{ $Student->username }}" ariadescribedby="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="{{ $Student->password }}" ariadescribedby="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#profile_picture');
        const imgPreview = document.querySelector('.profile-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function previewImageKtm() {
        const image = document.querySelector('#ktm_picture');
        const imgPreview = document.querySelector('.ktm-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection