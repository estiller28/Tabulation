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
    <title>MAO-Bulan | Request Update Dog Status</title>
</head>
<body>
<header id="header" class="d-flex align-items-center">
    <div class="container-xl d-flex align-items-center">
        <div class="me-auto">
            <a href="{{ url('/') }}"><img class="img-fluid" style="width: 54px;" src="{{ asset('/dist/logo/bulan_logo.png') }}">
                <span id="nav_title" class="px-2 text-white"><strong> Municipal Agriculture Office - Bulan</strong> </span>
            </a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a style="color: #B1D7B4;" class="nav-link scrollto active" href="{{ url('/') }}">Home</a></li>
                <li><a  class="nav-link scrollto text-white" href="{{ route('update.index') }}">Update Dog Status</a></li>
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
<section style="background: #FFFFFF;  width: 100%; height: 90vh;overflow: hidden; position: relative;">
    <div class="container mt-5">
        @livewire('update-dog-status')
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

@livewireScripts
<script src="{{ asset('home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('home/assets/js/main.js') }}"></script>
<style>
    .custom-error{
        font-size: 14px;
        color: red;
    }
    @media (max-width: 500px) {
        #nav_title{
            display: none;
        }
    }
</style>
</body>
</html>
