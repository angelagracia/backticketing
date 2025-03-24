<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ticketing | ISI Yogyakarta</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/img/logo/icon-isi.png') }}">
        <!-- Place favicon.ico in the root directory -->

		<!-- ========================= CSS here ========================= -->
		<link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap-5.0.0-alpha.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/LineIcons.2.0.css') }}">
		<link rel="stylesheet" href="{{ asset('front/assets/css/animate.css') }}">
		<link rel="stylesheet" href="{{ asset('front/assets/css/tiny-slider.css') }}">
		<link rel="stylesheet" href="{{ asset('front/assets/css/glightbox.min.css') }}">
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
                            <a class="navbar-brand" href="{{ route('index') }}l">
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
                                        <a class="page-scroll" href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('faqs') }}l">FAQ</a>
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
                                        <a class="page-scroll" href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                                <!-- <div class="header-btn">
                                    <a href="javascript:void(0)" class="theme-btn">Get Started</a>
                                </div> -->
                            </div> <!-- navbar collapse -->
                            <div class="button">
                                <a href="javacript:" data-toggle="modal" data-target="#login" class="login"><i
                                        class="lni lni-lock-alt"></i> Login</a>
                                <a href="{{ route('input_form_kc') }}" class="btn">Kirim cepat</a>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        
        </header>
        <!-- ========================= header end ========================= -->

        <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Contact Us</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Contact Area -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-12">
                            <div class="form-main">
                                <h3 class="inner-title left">Kritik dan Saran</h3>
                                <form class="form" method="post" action="assets/mail/mail.php">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <input name="name" type="text" placeholder="Masukkan Nama"
                                                    required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <input name="subject" type="text" placeholder="Tuliskan Subjek"
                                                    required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <input name="email" type="email" placeholder="Masukkan Email"
                                                    required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <input name="phone" type="text" placeholder="Masukkan Nomor Telepon"
                                                    required="required">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group message">
                                                <textarea name="message" placeholder="Tuliskan Kriik dan Saran"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="btn ">Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="contact-info">
                                <div class="single-head">
                                    <h3 class="inner-title">Informasi Kontak</h3>
                                    <div class="single-info">
                                        <i class="lni lni-phone"></i>
                                        <ul>
                                            <span>Lokasi</span>
                                            <li>Jl. Parangtritis Km. 6.5 Sewon Bantul <br> Yogyakarta 55188 <br> Indonesia</li>
                                        </ul>
                                    </div>
                                    <div class="single-info">
                                        <i class="lni lni-envelope"></i>
                                        <ul>
                                            <span>Telepon</span>
                                            <li><a href="#">0274-379133</a></li>
                                            <li><a href="#">373659</a></li>
                                        </ul>
                                    </div>
                                    <div class="single-info">
                                        <i class="lni lni-map"></i>
                                        <ul>
                                            <span>Email</span>
                                            <li><a href="mailto:support@yourmail.com">arts@isi.ac.id</a></li>
                                            <li><a href="mailto:contact@yourmail.com">helpdeskupatik@isi.ac.id</a></li>
                                        </ul>
                                    </div>
                                    <div class="single-info">
                                        <i class="lni lni-map"></i>
                                        <ul>
                                            <span>Jam Kerja</span>
                                            <li>Senin - Jumat (8.00-17.00)</li>
                                            <li>Sabtu - Minggu (Tutup)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->
        
        <!-- ========================= footer start ========================= -->
        <footer class="footer pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-widget mb-60 wow fadeInLeft" data-wow-delay=".2s">
                            <a href="{{ route('index') }}" class="logo mb-30"><img src="assets/img/logo-isi-black.svg" alt="logo"></a>
                            <p class="mb-30 footer-desc">Institut Seni Indonesia Yogyakarta atau ISI Yogyakarta, berdiri sejak 23 Juli 1984, adalah Perguruan Tinggi Negeri Seni Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Republik Indonesia dengan berbagai bidang seni terlengkap dan terbaik di Indonesia.</p>
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

        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top">
            <i class="lni lni-arrow-up"></i>
        </a>

<!-- Login Modal -->
<div class="modal fade form-modal" id="login" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog max-width-px-840 position-relative">
        <button type="button"
            class="circle-32 btn-reset bg-white pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper"
            data-dismiss="modal"><i class="lni lni-close"></i></button>
        <div class="login-modal-main">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="row">
                        <div class="heading text-center">
                            <h3>Masuk Akun</h3>
                            <p>Masuk untuk melanjutkan akun Anda</p>
                        </div>
                        <div class="or-devider">
                           
                        </div>
                        <form action="/">
                            <div class="form-group">
                                <label for="email" class="label">E-mail</label>
                                <input type="email" class="form-control" placeholder="example@gmail.com" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="label">Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter password">
                                </div>
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-end">
                                <a href="{{ route('forgetpassword') }}" class="font-size-3 text-dodger line-height-reset">Lupa Password</a>
                            </div>
                            <div class="form-group mb-8 button" >
                                <button class="btn btn-primary"> <a href="{{ route('home') }}">Log in</a>
                                </button>
                            </div>
                            <p class="text-center create-new-account">Belum memiliki Akun? <a href="#" data-toggle="modal" data-target="#signup" data-dismiss="modal">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Login Modal -->

<!-- Signup Modal -->
<div class="modal fade form-modal" id="signup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog max-width-px-840 position-relative">
        <button type="button"
            class="circle-32 btn-reset bg-white pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper"
            data-dismiss="modal"><i class="lni lni-close"></i></button>
        <div class="login-modal-main">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="row">
                        <div class="heading text-center">
                            <h3>Buat Akun Baru</h3>
                            <p>Buat akun Anda untuk melanjutkan proses ticketing</p>
                        </div>
                        <div class="or-devider">
                            <!-- <span>Or</span> -->
                        </div>
                        <form action="/">
                            <div class="form-group">
                                <label for="email" class="label">E-mail</label>
                                <input type="email" class="form-control" placeholder="example@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="label">Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control"
                                        placeholder="Enter password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="label">Konfirmasi Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control"
                                        placeholder="Enter password">
                                </div>
                            </div>
                            <div class="form-group mb-8 button">
                                <button class="btn btn-primary"><a href="#" data-toggle="modal" data-target="#login" data-dismiss="modal">Daftar</a>
                                </button>
                            </div>
                            <p class="text-center create-new-account">Sudah memiliki Akun? <a href="#" data-toggle="modal" data-target="#login" data-dismiss="modal">Masuk</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Signup Modal -->

    <!-- Kirim Cepat -->


    <div class="modal fade form-modal" id="kircep" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog max-width-px-900 position-relative">
            <button type="button"
                class="circle-32 btn-reset bg-white pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper"
                data-dismiss="modal"><i class="lni lni-close"></i></button>
            <div class="login-modal-main modal-lg">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="row">
                            <div class="heading">
                                <h3>Create a free Account <br> Today</h3>
                                <!-- <p>Create your account to continue <br> and explore new jobs.</p> -->
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="message-text" class="col-form-label">Message:</label>
                                  <textarea class="summernote" name="ckeditor"></textarea>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                      <div class="card">
                                        <div class="card-header">
                                          <h4>Multiple Upload</h4>
                                        </div>
                                        <div class="card-body">
                                          <form action="#" class="dropzone" id="mydropzone">
                                            <div class="fallback">
                                              <input name="file" type="file" multiple />
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </form>    
                                <div class="form-group row mb-4">
                                    <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary mt-3">Publish</button>
                                </div>                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- End Kirim Cepat -->


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
        <!-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> -->
        <!-- <script>
            CKEDITOR.replace( 'ckeditor' );
        </script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                new WOW().init();
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
    </body>
</html>
