@extends('studentDashboard.layout.main')

@section('content')
<!-- <title>Checkout example for Bootstrap</title> -->

<!-- Bootstrap core CSS -->
<!-- <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet"> -->
<div class="container container-card">
  <div class="py-5 text-center">
    <!-- <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
    <h2>Checkout form</h2>
    <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
  </div>

  <div class="row mt-3 justify-content-between">
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
        @foreach($borrow as $bw)
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">{{ $bw->book->title }}</h6>
            <small class="text-muted">{{ $bw->book->author }}</small>
          </div>
          <span class="text-muted">{{ $bw->number_book_borrow }}</span>
          <form action="{{ route('studentDashboard.destroy', $bw->id) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
          </form>
        </li>
        @endforeach
        <li class="list-group-item d-flex justify-content-start">
          <span>Total Book</span>
          @foreach( $cart as $cr)
          <strong style="margin-left: 380px;">{{ $cr->amount }}</strong>
          @endforeach
        </li>
      </ul>
    </div>
    @foreach( $cart as $cr)
    <form method="POST" action="{{ route('studentDashboard.update', $cr->id) }}" id="myForm" enctype="multipart/form-data">
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
        <input type="checkbox" class="custom-control-input" id="same-address">
        <label class="custom-control-label" for="same-address">I agree of JTI E-Library Term of Service</label>
      </div>
      <hr class="mb-4">
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
  </div>
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