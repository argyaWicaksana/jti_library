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
                    <form method="post" action="{{ route('transaction.update', $trans->id) }}" id="myForm"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="status_id">Book Status</label>
                            <select name="status_id" id="status_id" class="form-control">
                                @foreach ($status as $st)
                                    <option value="{{ $st->id }}"
                                        {{ $trans->status_id == $st->id ? 'selected' : '' }}>{{ $st->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @php
                            if ($trans->actual_return) {
                                // menghitung denda
                                $returnDate = Carbon\Carbon::parse($trans->date_returndata);
                                $actualReturn = Carbon\Carbon::parse($trans->actual_return);
                                $diffDate = $returnDate->diffInDays($actualReturn, false);
                            }
                        @endphp
                        @if (isset($diffDate) && $diffDate > 0)
                            <div class="form-group mb-3">
                                <label for="fine_paid">Fine Status</label>
                                <select name="fine_paid" id="fine_paid" class="form-control">
                                    <option value="1" {{ $trans->fine_paid == true ? 'selected':'' }}>Paid</option>
                                    <option value="0" {{ $trans->fine_paid == false ? 'selected':'' }}>Unpaid</option>
                                </select>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="card-footer bg-white">
                    <a class="btn btn-success w-100" href="{{ url('transaction') }}">Back</a>
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
