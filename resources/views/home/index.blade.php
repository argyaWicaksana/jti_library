@extends('home.layout.main')

@section('content')

<section id="home">

  <div class="container">
    <div class="row row-home justify-content-between">
      <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
        <div data-aos="zoom-out">
          <h1>Welcome to <span>JTI E-Library</span></h1>
          <h2>Get your book and spend time for read more</h2>
          <div class="text-center text-lg-start">
            <a href="#about" class="btn-get-started scrollto">Catalog</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 order-1 order-lg-2 home-img" data-aos="zoom-out" data-aos-delay="300">
        <img src="assets/img/home-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

  <svg class="home-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
      <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
    </defs>
    <g class="wave1">
      <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
    </g>
    <g class="wave2">
      <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
    </g>
    <g class="wave3">
      <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
    </g>
  </svg>

</section>
<!-- ======= Catalog Section ======= -->
<section id="about" class="about">
  <div class="container-search">
    <div class="row justify-content-end">
      <div class="col-md-4">
        <div class="input-group mb-3">
          <input type="text" class="form-control input-text" placeholder="Search products...." aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-purple btn-lg" type="button"><i class="bi bi-search"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section id="team" class="team">
    <div class="container">
      <div class="row" data-aos="fade-left">
        @foreach($catalog as $ctg)
        <div class="col-lg-2 col-md-6 mt-5 mt-md-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="200">
            <div class="pic">
              @php
              $pathImage = '';
              $ctg->photo ? ($pathImage = 'storage/' . $ctg->photo) : ($pathImage = 'picture/empty.png');
              @endphp
              <img src="{{ asset('' . $pathImage . '') }}" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <h4>{{ $ctg->title }}</h4>
              <span>{{ $ctg-> author }}</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:{{ $ctg->stock }} available</i>
                <i action="{{ route('home.detail', $ctg->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <a href="{{ route('home.detail',$ctg->id) }}"><i class="bi bi-file-text-fill"></i></a>
                </i>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        <!-- <div class="col-lg-2 col-md-6 mt-5 mt-md-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="200">
            <div class="pic"><img src="assets/img/book/book2.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Negeri Para Bedebah</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:3 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="300">
            <div class="pic"><img src="assets/img/book/book3.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Bumi</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:2 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book4.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Nebula</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:4 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book5.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Home Sweet Loan</h4>
              <span>Almira Bastari</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:1 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book6.jpeg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Rapijali</h4>
              <span>Dee Lestari</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:5 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row" data-aos="fade-left">
        <div class="col-lg-2 col-md-6">
          <div class="member" data-aos="zoom-in" data-aos-delay="100">
            <div class="pic"><img src="assets/img/book/book1.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Hujan</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:6 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-md-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="200">
            <div class="pic"><img src="assets/img/book/book2.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Negeri Para Bedebah</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:3 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="300">
            <div class="pic"><img src="assets/img/book/book3.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Bumi</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:2 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book4.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Nebula</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:4 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book5.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Home Sweet Loan</h4>
              <span>Almira Bastari</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:1 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book6.jpeg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Rapijali</h4>
              <span>Dee Lestari</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:5 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row" data-aos="fade-left">
        <div class="col-lg-2 col-md-6">
          <div class="member" data-aos="zoom-in" data-aos-delay="100">
            <div class="pic"><img src="assets/img/book/book1.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Hujan</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:6 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-md-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="200">
            <div class="pic"><img src="assets/img/book/book2.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Negeri Para Bedebah</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:3 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="300">
            <div class="pic"><img src="assets/img/book/book3.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Bumi</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:2 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book4.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Nebula</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:4 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book5.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Home Sweet Loan</h4>
              <span>Almira Bastari</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:1 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book6.jpeg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Rapijali</h4>
              <span>Dee Lestari</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:5 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row" data-aos="fade-left">
        <div class="col-lg-2 col-md-6">
          <div class="member" data-aos="zoom-in" data-aos-delay="100">
            <div class="pic"><img src="assets/img/book/book1.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Hujan</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:6 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-md-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="200">
            <div class="pic"><img src="assets/img/book/book2.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Negeri Para Bedebah</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:3 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="300">
            <div class="pic"><img src="assets/img/book/book3.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Bumi</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:2 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book4.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Nebula</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:4 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book5.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Home Sweet Loan</h4>
              <span>Almira Bastari</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:1 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book6.jpeg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Rapijali</h4>
              <span>Dee Lestari</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:5 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row" data-aos="fade-left">
        <div class="col-lg-2 col-md-6">
          <div class="member" data-aos="zoom-in" data-aos-delay="100">
            <div class="pic"><img src="assets/img/book/book1.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Hujan</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:6 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-md-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="200">
            <div class="pic"><img src="assets/img/book/book2.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Negeri Para Bedebah</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:3 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="300">
            <div class="pic"><img src="assets/img/book/book3.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Bumi</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:2 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book4.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Nebula</h4>
              <span>Tere Liye</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:4 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book5.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Home Sweet Loan</h4>
              <span>Almira Bastari</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:1 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
          <div class="member" data-aos="zoom-in" data-aos-delay="400">
            <div class="pic"><img src="assets/img/book/book6.jpeg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Rapijali</h4>
              <span>Dee Lestari</span>
              <div class="social">
                <i class="bi bi-book"></i>
                <i>:5 available</i>
                <a href=""><i class="bi bi-file-text-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div> -->
  </section>
  <!-- End Team Section -->

  </main>
  <!-- End #main -->
  @endsection