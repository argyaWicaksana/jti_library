@extends('admin.book.mainlayout')
@section('title', 'Add Books')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="card col-lg-6">
            <div class="card-title text-center mt-4">
                <h5>Add New Books Data</h5>
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
                <form method="post" action="{{ route('book.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="title" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <img class="photo-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="photo" name="photo" onchange="previewImage()">
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="date" class="form-control" id="year" name="year">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">status</label>
                        <input type="status" class="form-control" id="status" name="status">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="stock" class="form-control" id="stock" name="stock">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="author" class="form-control" id="author" name="author">
                    </div>
                    <div class="mb-3">
                        <label for="isbn_issn" class="form-label">ISBN/ISSN</label>
                        <input type="isbn_issn" class="form-control" id="isbn_issn" name="isbn_issn">
                    </div>
                    <div class="mb-3">
                        <label for="type_id" class="form-label">Type</label>
                        <select name="type_id" class="form-control">
                            <option value="">--Select--</option>
                            @foreach ($type as $tp)
                            <option value="{{ $tp->id }}">{{ $tp->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="publisher_id" class="form-label">Publisher</label>
                        <select name="publisher_id" class="form-control">
                            <option value="">--Select--</option>
                            @foreach ($publisher as $pbs)
                            <option value="{{ $pbs->id }}">{{ $pbs->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-danger" href="{{ route('book.index') }}">Cancel</a>
                </form>
            </div>
        </div>

    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#photo');
        const imgPreview = document.querySelector('.photo-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection