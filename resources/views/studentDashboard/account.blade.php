@extends('studentDashboard.layout.main')

@section('content')

<section class="account">
    <main role="main" class="container">
        <div class="row justify-content-center">
            @if ($message = Session::get('success'))<div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            @foreach ($student as $mhs)
            <div class="col-md-4">
                @php
                $pathImage = '';
                $mhs->profile_picture ? ($pathImage = 'storage/' . $mhs->profile_picture) : ($pathImage = 'picture/empty.png');
                @endphp
                <img src="{{ asset('' . $pathImage . '') }}" width="100%" alt="">
            </div>
           
            <div class="col-md-4">
                <label for="name" style="font-weight: bolder;">Name:</label>
                <p class="" name="name" id="name">{{ $mhs ->name }}</p>

                <label for="nim" style="font-weight: bolder;">NIM:</label>
                <p class="" name="nim" id="nim">{{ $mhs ->nim }}</p>

                <label for="username" style="font-weight: bolder;">Username:</label>
                <p class="" name="username" id="username">{{ $mhs ->username }}</p>

                <label for="ktm_picture" style="font-weight: bolder;">KTM:</label>

                <div>
                    @php
                    $pathImage = '';
                    $mhs->ktm_picture ? ($pathImage = 'storage/' . $mhs->ktm_picture) : ($pathImage = 'picture/empty.png');
                    @endphp
                    <img src="{{ asset('' . $pathImage . '') }}" width="100" alt="">
                </div>
            </div>
            @endforeach

        </div>


    </main>
</section>
@endsection