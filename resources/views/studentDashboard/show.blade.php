<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JTI E-Library</title>

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <!-- <link href="assets/img/logo.png" rel="apple-touch-icon"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .navbar-brand {
            color: #fff;
            font-weight: 700;
            font-family: "Montserrat", sans-serif;
            font-size: 30px;
        }

        .nav-link {
            color: #fff;
            font-weight: 600;
            font-family: "Montserrat", sans-serif;
            font-size: 15px;
            margin-right: 15px;
        }

        .navbar {
            background-color: rgba(2, 5, 161, 0.91);
        }

        .img-book {
            padding: 20px;
            width: 25rem;
        }

        .title {
            font-weight: 700;
            font-size: 40px;
            margin-bottom: 10px;
        }

        .desc {
            margin-top: 5px;
        }

        .footer {
            background-color: rgba(2, 5, 161, 0.91);
            justify-content: center;
            color: #fff;
            height: 75px;
            padding: 25px;
        }

        .bi-arrow-left {
            width: 50px;
        }

        .input-amount {
            margin-top: 12px;
            width: 150px;
            margin-bottom: 10px;
        }

        .btn {
            width: 260px;
            margin-top: 10px;
        }
        .amount{
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">JTI E-Library</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-end" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/contactus">Contact Us</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Begin page content -->
    <main role="main" class="container mt-5">
        <div class="row">
            <div class="col-md-1 mt-5">
                <a href="/studentdashboard">
                    <i class="bi bi-arrow-left" style="font-size: 3rem;"></i>
                </a>
            </div>
            <div class="col-md-5 mt-5">
                @php
                $pathImage = '';
                $catalog->photo ? ($pathImage = 'storage/' . $catalog->photo) : ($pathImage = 'picture/empty.png');
                @endphp
                <img src="{{ asset('' . $pathImage . '') }}" class="img-fluid float-end img-book" alt="">
            </div>
            <div class="col-md-6 mt-5">
                <h5 class="mt-2 title">{{ $catalog->title }}</h5>
                <div class="desc"><b>Year Publish: </b>{{$catalog->year}}</div>
                <div class="desc"><b>Stock: </b>{{$catalog->stock}}</div>
                <div class="desc"><b>Author: </b>{{$catalog->author}}</div>
                <div class="desc"><b>Status: </b>{{$catalog->status}}</div>
                <div class="desc"><b>ISBN/ISSN: </b>{{$catalog->isbn_issn}}</div>
                <div class="desc"><b>Type: </b>{{$catalog->type->name}}</div>
                <div class="desc"><b>Publisher: </b>{{$catalog->publisher->name}}</div>
                <div class="desc"><b>Description: </b>{{$catalog->description}}</div>
                <form action="{{ route('studentDashboard.borrow', $catalog->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 amount">
                            <b>Amount   :</b>
                        </div>
                        <div class="col-md-2 text-start">
                            <input class="form-control input-amount" type="text" name="amount">
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" role="button" type="submit">Checkout</button>
                </form>
            </div>
        </div>

    </main>

    <footer class="footer mt-5">
        <div class="container text-center">
            <div class="copyright">
                &copy; Copyright <strong><span>JTI E-Library</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>
</body>

</html>