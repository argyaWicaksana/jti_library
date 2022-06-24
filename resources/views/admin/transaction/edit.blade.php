@extends('admin.transaction.mainlayout')
@section('title', 'Edit Transaction')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="card col-lg-6">
            <div class="card-title text-center mt-4">
                <h5>Edit Transaction Data</h5>
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
                <form method="post" action="{{ route('transaction.update', $trans->id) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="status" class="form-label">status</label>
                        <input type="text" name="status" class="form-control" id="status" value="{{ $trans->status }}" ariadescribedby="status">
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