@extends('home.layout.main')

@section('content')

<!-- ======= About Section ======= -->
<section id="details" class="details">
    <div class="container">
        <br><br><br>
        <div class="row content">
            <div class="col-md-4" data-aos="fade-right">
                <img src="assets/img/details-1.png" class="img-fluid" alt="">
            </div>
            <div class="col-md-8 pt-4" data-aos="fade-up">
                <h3>What is JTI E-LIBRARY ?</h3>
                <p class="fst-italic">
                    JTI E-LIBRARY is department library in JTI State Polytechnic of Malang. It is used for managing transaction
                    in department library. 
                </p>
                <ul>
                    <li><i class="bi bi-check"></i> Easy to borrow</li>
                    <li><i class="bi bi-check"></i> Easy to return</li>
                    <li><i class="bi bi-check"></i> Easy to see available books</li>
                    <li><i class="bi bi-check"></i> Easy to use</li>
                </ul>
                <p>
                    #TI FAST, TI FAST <br>
                    #TI Bravo, Bravo, Bravo
                </p>
            </div>
        </div>

    </div>
</section><!-- End About Section -->
<!-- ======= Team Section ======= -->
<section id="team" class="team">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Team</h2>
            <p>Our Great Team</p>
        </div>

        <div class="row justify-content-center" data-aos="fade-left">

            <div class="col-lg-3 col-md-6">
                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Muhammad Ilham El Hakim</h4>
                        <span>"Hidup di sini masa kini"</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="member" data-aos="zoom-in" data-aos-delay="400">
                    <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Hilda Khoirotul Hidayah</h4>
                        <span>"Kapan pun melangkah jangan lupa bersyukur"</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Team Section -->
@endsection