@extends('studentDashboard.layout.main')

@section('content')

<section class="account">
    <main role="main" class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <img src="assets/img/team/team-3.jpg" alt="" class="w-100" name="profile_picture" id="profile_picture">
            </div>
            <div class="col-md-4">
                <label for="name" style="font-weight: bolder;">Name:</label>
                <p class="" name="name" id="name">User</p>
                <label for="nim" style="font-weight: bolder;">NIM:</label>
                <p class="" name="nim" id="nim">0000000</p>
                <label for="username" style="font-weight: bolder;">Username:</label>
                <p class="" name="username" id="username">Username</p>
                <label for="ktm_picture" style="font-weight: bolder;">KTM:</label>
                <div>
                    <img src="assets/img/slider-1.jpg" alt="" name="ktm_picture" id="ktm_picture" style="height: 3.5cm; width: 6cm;">
                </div>
            </div>
        </div>


    </main>
</section>
@endsection