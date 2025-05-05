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
                            <a class="navbar-brand" href="{{ route('index') }}">
                                <img src="{{ asset('front/assets/img/logo/logo_new.svg') }}" alt="Logo">
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
                                        <a class="page-scroll active" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#alur-tiketing">Alur Tiketing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#faqs">FAQS</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#team">Team</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="page-scroll" href="contact.html">Contact</a>
                                    </li>
                                </ul>
                                <!-- <div class="header-btn">
                                    <a href="javascript:void(0)" class="theme-btn">Get Started</a>
                                </div> -->
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        
        </header>
        <!-- ========================= header end ========================= -->

        <!-- Start Breadcrumbs -->
    <!-- ========================= page-banner-section start ========================= -->
    <section class="page-banner-section pt-75 pb-75 img-bg" style="background-image: url('{{ asset('front/assets/img/bg/common-bg.svg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="banner-content">
                        <h2 class="text-white">Sign In</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)"></a>Home</li>
                                    <li class="breadcrumb-item active" aria-current="page">Sign In</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= page-banner-section end ========================= -->
    <!-- End Breadcrumbs -->

    <!-- Start Account Sign In Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form inner-content" action="signin" method="post">
                        <div class="card-body">
                            <div class="title">
                                <h3>Masuk Sekarang</h3>
                                <p>Masuk dengan memasukkan informasi di bawah ini</p>
                            </div>
                            <div class="input-head">
                                <label for="email" class="form-label">Email</label>
                                <div class="form-group input-group">
                                    <label><i class="lni lni-envelope"></i></label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Enter your email" required>
                                </div>
                                <label for="password" class="form-label"> Password</label>
                                <div class="form-group input-group">
                                    <label><i class="lni lni-lock-alt"></i></label>
                                    <input class="form-control" type="password" id="password" name="password"
                                        placeholder="Enter your password" required>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-end bottom-content">
                                <a class="lost-pass" href="forgetpassword.html">Lupa password?</a>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Sign In</button>
                                <a class="btn alt" href="register.html">Buat Akun</a>
                            </div>
                        </div>
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
                <!-- <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-widget mb-60 wow fadeInUp" data-wow-delay=".6s">
                        <h4>Service</h4>
                        <ul class="footer-links">
                            <li>
                                <a href="javascript:void(0)">Marketing</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Branding</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Web Design</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Graphics Design</a>
                            </li> 
                        </ul>
                    </div>
                </div> -->
                <div class="col-xl-5 col-lg-6 col-md-6">
                    <div class="footer-widget mb-60 wow fadeInRight" data-wow-delay=".8s">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.414476050739!2d110.35395917394062!3d-7.85161617803124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57ae2d6cfed5%3A0xd1f3ed5b1b96c896!2sInstitut%20Seni%20Indonesia%20Yogyakarta!5e0!3m2!1sid!2sid!4v1740975077632!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <div class="copyright-area">
                <p class="mb-0 text-black text-center">Copyright © 2025. UPA. Teknologi Informasi dan Komunikasi</p>
            </div>

        </div>
    </footer>
    <!-- ========================= footer end ========================= -->




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

<!-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> -->
<!-- <script>
    CKEDITOR.replace( 'ckeditor' );
</script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>