@extends('studentDashboard.layout.main')

@section('content')
    <div class="container container-card">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
        </div>

        <div class="row mt-3 justify-content-between">
            @if ($cart)
                <div class="col mb-4 ">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your Book</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><strong>Title</strong></h6>
                            </div>
                            <span class="text-muted"><strong>Amount</strong></span>
                            <span class="text-muted"><strong>Delete</strong></span>
                        </li>
                        @foreach ($cart->books as $bw)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $bw->title }}</h6>
                                    <small class="text-muted">{{ $bw->author }}</small>
                                </div>
                                <span class="text-muted">{{ $bw->pivot->number_book_borrow }}</span>
                                <form action="{{ route('studentDashboard.destroy', $bw->pivot->id) }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-start">
                            <span>Total Book</span>
                            <strong style="margin-left: 380px;">{{ $cart->amount }}</strong>
                        </li>
                    </ul>
                </div>

                <form method="POST" action="{{ route('studentDashboard.update', $cart->id) }}" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POSt')
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="date_borrow">Date Booking</label>
                            <div class="mb-3">
                                <input type="date" class="form-control" id="date_borrow" name="date_borrow">
                            </div>
                            <div class="invalid-feedback">
                                Please select a valid date.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="date_returndata">Date Returned</label>
                            <div class="mb-3">
                                <input type="date" class="form-control" id="date_returndata" name="date_returndata">
                            </div>
                            <div class="invalid-feedback">
                                Please select a valid date.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address" required>
                        <label class="custom-control-label" for="same-address">I agree of JTI E-Library Term of
                            Service</label>
                    </div>
                    <hr class="mb-4">
                    <button type="submit" class="btn btn-primary">Checkout</button>
                </form>
			@else
				<h6 class="text-center">There is no book in your cart</h6>
            @endif
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
