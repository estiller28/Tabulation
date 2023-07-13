<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Bureau of Animal Industry"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    @livewireStyles
    <link href="{{ asset('home/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('./storage/logo/bulan_logo.png') }}"/>
    <title>MAO-Bulan | Home</title>
</head>
<body>
<header id="header" class="d-flex align-items-center">
    <div class="container-xl d-flex align-items-center">
        <div class="me-auto">
            <a href="{{ url('/') }}"><img class="img-fluid" style="width: 54px;" src="{{ asset('/dist/logo/bulan_logo.png') }}">
                <span id="nav_title" class="px-2 text-white"><strong>Municipal Agriculture Office - Bulan
</strong> </span>
            </a>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto text-white" href="">Home</a></li>
                <li><a style="color: #B1D7B4;" class="nav-link scrollto " href="{{ route('update.index') }}">Update Dog Status</a></li>
                @if (Route::has('login'))
                    @auth
                        <li><a class="getstarted scrollto text-white" href="{{ url('/dashboard') }}">Dashboard</a></li>
                    @else
                        <li><a class="getstarted scrollto text-white" href="{{ route('login') }}">Login</a></li>
                    @endauth
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle text-white"></i>
        </nav>
    </div>
</header>

<section id="hero" style="background: #FFFFFF">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <img class="img-fluid" style="width: 250px;" src="{{ asset('dist/logo/bulan_logo.png') }}" alt="">
        </div>
        <div class="row mt-5 d-flex justify-content-center">
            <h2 class="animate__animated animate__fadeInDown text-dark">Welcome to Municipal Agriculture Office - Bulan
            </h2>
            <p class="animate__animated animate__fadeInUp text-dark">Bulan Sorsogon Philippines</p>
            <div class="col-md-4">
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Search Dogs</a>
            </div>
        </div>
    </div>
</section>

<main id="main" style="background: #ffff;">
    <section id="cta" class="cta">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center text-lg-start">
                    <h3>
                        Online viewing of owned dog informations
                    </h3>
                    <p>  This website will provide an access to public to search dogs and view  their informations.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <div class="section-title">
                <h2>Search Dogs</h2>
                <p class="text-dark">In this section, you will be able to search dog informations should you found missing dogs in anywhere you are.
                    Simply provide the dog ID number and you'll see results in seconds.</p>
            </div>

            @livewire('search-dogs')

        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <h4>Municipality of Bulan Sorsogon </h4>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>Municipal Agriculture Office - Bulan</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Powered by <a href="{{ url('/') }}">SSU BC - Capstone</a>
            </div>
        </div>
    </footer>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</main>
@livewireScripts

<style>
    @media (max-width: 500px) {
        #nav_title{
            display: none;
        }
    }
</style>
<script src="{{ asset('home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('home/assets/js/main.js') }}"></script>

</body>
</html>
