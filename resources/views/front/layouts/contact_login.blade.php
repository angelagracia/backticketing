<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Tiketing | ISI Yogyakarta</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/img/logo/icon-isi.png') }}">

		<!-- ========================= CSS here ========================= -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap-5.0.0-alpha.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/LineIcons.2.0.css') }}">
		<link rel="stylesheet" href="{{ asset('front/assets/css/animate.css') }}">
		<link rel="stylesheet" href="{{ asset('front/assets/css/tiny-slider.css') }}">
		<link rel="stylesheet" href="{{ asset('front/assets/css/glightbox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
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
                                <img src="{{ asset('front/assets/img/logo/logo-new.svg') }}" alt="Logo">
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
                                        <a class="page-scroll" href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('faqs_login') }}">FAQ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll active" href="{{ route('contact_login') }}">Contact</a>
                                    </li>
                                </ul>

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
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="lni lni-user"></i> My Account</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('home.profile')}}"><i class="lni lni-briefcase"></i>Profil</a>
                                            <a class="dropdown-item" href="{{route('home.akun')}}"><i class="lni lni-rocket"></i> Akun</a>
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
                            <li><a href="index.html">Home</a></li>
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
                                                    <textarea name="message" placeholder="Tuliskan Kritik dan Saran"></textarea>
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
                                                <li>Sunday - Thusday (Tutup)</li>
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
                            <a href="{{route('index')}}" class="logo mb-30"><img src="{{asset('front/assets/img/logo-isi-black.svg')}}" alt="logo"></a>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    confirmButtonColor: "#0d6efd",
                    confirmButtonText: "#3085d6",
                    confirmButtonText: "Ya, Logout!",
                    cancelButtonText: "Batal",
                    cancelButtonColor: "#d33"
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
