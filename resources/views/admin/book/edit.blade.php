@extends('admin.book.mainlayout')
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
                <form method="post" action="{{ route('book.update', $Book->id) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $Book->title }}" ariadescribedby="title">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Image</label>
                        <input type="hidden" name="oldProfile" value="{{ $Book->photo }}">
                        @if($Book->photo)
                        <img src="{{ asset ('storage/' . $Book->photo) }}" class="photo-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                        <img class="photo-preview img-fluid mb-3 col-sm-5">
                        @endif
                        
                        <input class="form-control" type="file" id="photo" name="photo" onchange="previewImage()">
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year Publish</label>
                        <input type="date" name="year" class="form-control" id="year" value="{{ $Book->year }}" ariadescribedby="year">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="status" name="status" class="form-control" id="status" value="{{ $Book->status }}" ariadescribedby="status">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="stock" name="stock" class="form-control" id="stock" value="{{ $Book->stock }}" ariadescribedby="stock">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="author" name="author" class="form-control" id="author" value="{{ $Book->author }}" ariadescribedby="author">
                    </div>
                    <div class="mb-3">
                        <label for="isbn_issn" class="form-label">ISBN/ISSN</label>
                        <input type="isbn_issn" name="isbn_issn" class="form-control" id="isbn_issn" value="{{ $Book->isbn_issn }}" ariadescribedby="isbn_issn">
                    </div>
                    <div class="form-group">
                        <label for="type_id">Type</label>
                        <select name="type_id" id="type_id" class="form-control">
                            @foreach($type as $tp)
                            <option value="{{$tp->id}}" {{$Book->type_id == $tp->id ? 'selected' : ''}}>{{$tp->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="publisher_id">Publisher</label>
                        <select name="publisher_id" id="publisher_id" class="form-control">
                            @foreach($publisher as $pbs)
                            <option value="{{$pbs->id}}" {{$Book->publisher_id == $pbs->id ? 'selected' : ''}}>{{$pbs->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="description" name="description" class="form-control" id="description" value="{{ $Book->description }}" ariadescribedby="description">
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