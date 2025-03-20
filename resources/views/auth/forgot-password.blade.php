{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}







<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Tiketing | ISI Yogyakarta</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/icon-isi.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- ========================= CSS here ========================= -->
		<link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap-5.0.0-alpha.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/LineIcons.2.0.css') }}">
		<link rel="stylesheet" href="{{ asset('front/assets/css/animate.css') }}">
		<link rel="stylesheet" href="{{ asset('front/assets/css/tiny-slider.css') }}">
		<link rel="stylesheet" href="{{ asset('front/assets/css/glightbox.min.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}">
		<!-- <link rel="stylesheet" href="dashboard/style.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- ========================= preloader start ========================= -->
            <div class="preloader">
                <div class="loader">
                    <div class="ytp-spinner">
                        <div class="ytp-spinner-container">
                            <div class="ytp-spinner-rotator">
                                <div class="ytp-spinner-left">
                                    <div class="ytp-spinner-circle"></div>
                                </div>
                                <div class="ytp-spinner-right">
                                    <div class="ytp-spinner-circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- preloader end -->

        <!-- ========================= header start ========================= -->
        <header class="header navbar-area bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="assets/img/logo/logo-ticketing.svg" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="page-scroll" href="dashboard/home.html">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="faqs_login.html">FAQ</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#alur-tiketing">Alur Tiketing</a>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#team">Team</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="page-scroll active" href="contact_login.html">Contact</a>
                                    </li>
                                </ul>
                                <!-- <div class="header-btn">
                                    <a href="javascript:void(0)" class="theme-btn">Get Started</a>
                                </div> -->

                                <!-- Notification -->
                                <div class="notification">
                                    <div class="nav-item">
                                        <i class="lni lni-alarm" id="notificationIcon"></i>
                                        <span class="badge">3</span>
                                    </div>
                                    <div class="dropdown-menu" id="notificationDropdown">
                                        <div class="dropdown-header">
                                            <span>Notifications</span>
                                            <a href="#" class="mark-read">Mark All As Read</a>
                                        </div>
                                        <ul class="notification-list">
                                            <li>
                                                <i class="lni lni-code"></i>
                                                <div class="notification-text">
                                                    <p>Permohonan ditutup</p>
                                                    <small>2 MIN AGO</small>
                                                </div>
                                            </li>
                                            <li>
                                                <i class="lni lni-user"></i>
                                                <div class="notification-text">
                                                    <p>Permohonan sedang diproses</p>
                                                    <small>10 HOURS AGO</small>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="dropdown-footer">
                                            <a href="#">View All</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Button Profile -->
                                <ul class="sign-in">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="profile.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="lni lni-user"></i> My Account</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="dashboard/profile.html"><i class="lni lni-briefcase"></i>Profile</a>
                                            <a class="dropdown-item" href="dashboard/akun.html"><i class="lni lni-rocket"></i> Account</a>
                                            <a class="dropdown-item logout-btn" id="logoutButton" href="#"><i class="lni lni-close"></i>Logout</a>
                                        </div>
                                    </li>
                                </ul>

                            </div> <!-- navbar collapse -->

                            
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        
        </header>
        <!-- ========================= header end ========================= -->

        <!-- ========================= page-banner-section start ========================= -->
        <section class="page-banner-section pt-75 pb-75 img-bg" style="background-image: url({{ asset('front/assets/img/bg/common-bg.svg') }})">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="banner-content">
                            <h2 class="text-white">Lupa Kata Sandi</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)"></a>Home</li>
                                        <li class="breadcrumb-item active" aria-current="page">Lupa Kata Sandi</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========================= page-banner-section end ========================= -->

        <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Lupa Kata Sandi</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>Lupa Kata Sandi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Account Sign In Area -->
    <div class="account-login section pt-75 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                     <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form class="card login-form inner-content" method="post" action="{{ route('password.email') }} ">
                        @csrf
                        <div class="card-body">
                            <div class="title text-center">
                                <h3>Ubah Kata Sandi</h3>
                                <p>Isi formulir di bawah ini untuk mengatur ulang kata sandi Anda.</p>
                            </div>
                            <div class="input-head">
                                <div class="form-group input-group">
                                    {{-- <label><i class="lni lni-envelope"></i></label>
                                    <input class="form-control" type="email" id="reg-email"
                                        placeholder="Masukkan Email Anda" required> --}}
                                    {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                                        
                                </div>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Permintaan Ubah Kata Sandi</button>
                            </div>
                        </div>
                        <p class="text-center mt-3">Sudah punya akun? <a href="#" data-toggle="modal" data-target="#login">Masuk</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Sign In Area -->

        <!-- ========================= footer start ========================= -->
        <footer class="footer pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-widget mb-60 wow fadeInLeft" data-wow-delay=".2s">
                            <a href="index.html" class="logo mb-30"><img src="assets/img/logo-isi-black.svg" alt="logo"></a>
                            <p class="mb-30 footer-desc">We Crafted an awesome desig library that is robust and intuitive to use. No matter you're building a business presentation websit.</p>
                            <div class="footer-social-links">
                                <ul class="d-flex">
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-instagram-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 offset-xl-1 col-lg-3 col-md-6">
                        <div class="footer-widget mb-60 wow fadeInUp" data-wow-delay=".4s">
                            <h4>Quick Link</h4>
                            <ul class="footer-links">
                                <li>
                                    <a href="javascript:void(0)">Home</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Alur Ticekting</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">FAQs</a>
                                </li> 
                                <li>
                                    <a href="javascript:void(0)">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="footer-widget mb-60 wow fadeInRight" data-wow-delay=".8s">
                            <h4>Contact</h4>
                            <ul class="footer-contact">
                                <li>
                                    <p>0274-379133, 373659</p>
                                </li>
                                <li>
                                    <p>isiyogyakarta@example.com</p>
                                </li>
                                <li>
                                    <p>Jl. Parangtritis Km. 6.5 Sewon, Bantul, Yogyakarta, 55188</br>
                                    Indonesia</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="copyright-area">
                    <p class="mb-0 text-black text-center">Copyright © 2025. UPA. Teknologi Informasi dan Komunikasi</p>
                </div>

            </div>
        </footer>
        <!-- ========================= footer end ========================= -->
        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top">
            <i class="lni lni-arrow-up"></i>
        </a>

		<!-- ========================= JS here ========================= -->
        <script src="{{ asset('front/assets/js/bootstrap.bundle-5.0.0.alpha-min.js') }}"></script>
        <script src="{{ asset('front/assets/js/contact-form.js') }}"></script>
        <script src="{{ asset('front/assets/js/count-up.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/tiny-slider.js') }}"></script>
        <script src="{{ asset('front/assets/js/isotope.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/imagesloaded.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                new WOW().init();
            });
        </script>
        <script>
            document.getElementById("logoutButton").addEventListener("click", function (event) {
                event.preventDefault(); // Mencegah link langsung dijalankan
        
                Swal.fire({
                    title: "Konfirmasi Logout",
                    text: "Apakah Anda yakin ingin keluar?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Logout!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Berhasil Logout",
                            text: "Anda akan diarahkan ke halaman login.",
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false
                        });
        
                        // Simulasi logout (bisa diganti dengan AJAX atau redirect ke backend logout)
                        setTimeout(() => {
                            window.location.href = "index.html"; // Redirect ke halaman login
                        }, 2000);
                    }
                });
            });
        </script>
         <script type="text/javascript">
            //========= testimonial 
            tns({
                container: '.testimonial-slider',
                items: 3,
                slideBy: 'page',
                autoplay: false,
                mouseDrag: true,
                gutter: 0,
                nav: true,
                controls: false,
                controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                    },
                    540: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1170: {
                        items: 3,
                    }
                }
            });
    
            //====== counter up 
            var cu = new counterUp({
                start: 0,
                duration: 2000,
                intvalues: true,
                interval: 100,
                append: " ",
            });
            cu.start();
    
    
            window.onscroll = function () {
                var header_navbar = document.querySelector(".navbar-area");
                var sticky = header_navbar.offsetTop;
    
                // show or hide the back-top-top button
                var backToTo = document.querySelector(".scroll-top");
                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                    backToTo.style.display = "flex";
                } else {
                    backToTo.style.display = "none";
                };
    
                if (window.pageYOffset > sticky) {
                    header_navbar.classList.add("sticky");
                } else {
                    header_navbar.classList.remove("sticky");
                }
    
                var logo = document.querySelector('.style2.navbar-brand img')
                if (window.pageYOffset > sticky) {
                    logo.src = 'assets/images/logo/logo.svg';
                } else {
                    logo.src = 'assets/images/logo/white-logo.svg';
                };
    
            };
        </script>
        <script>
            document.getElementById("notificationIcon").addEventListener("click", function () {
                var dropdown = document.getElementById("notificationDropdown");
                dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
            });

            // Menutup dropdown jika klik di luar elemen
            document.addEventListener("click", function (event) {
                var dropdown = document.getElementById("notificationDropdown");
                var icon = document.getElementById("notificationIcon");
                if (!icon.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.style.display = "none";
                }
            });

           </script>
    </body>
</html>
