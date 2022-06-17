<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a href="/"><span>JTI E-Library</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li class="nav-item {{ ($title === " Home") ? 'active' : '' }}">
                    <a class="nav-link scrollto " href="/studentdashboard">Home</a></li>
                <li class="nav-item {{ ($title === " Cart") ? 'active' : '' }}">
                    <a class="nav-link scrollto" href="/cart">Cart</a></li>
                <li class="nav-item {{ ($title === " Account") ? 'active' : '' }}">
                    <a class="nav-link scrollto" href="/account">Account</a></li>
                <!-- <li><a class="nav-link scrollto" href="/login">Login</a></li> -->
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->