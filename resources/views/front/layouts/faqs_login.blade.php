<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ticketing | ISI Yogyakarta</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- ========================= CSS here ========================= -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/LineIcons.2.0.css') }}">
		<link rel="stylesheet" href="{{ asset('front/assets/css/animate.css') }}">
        <script src="{{ asset('front/assets/js/bootstrap.bundle-5.0.0.alpha-min.js') }}"></script>
		<script src="{{ asset('front/assets/js/contact-form.js') }}"></script>
        <script src="{{ asset('front/assets/js/count-up.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/tiny-slider.js') }}"></script>
        <script src="{{ asset('front/assets/js/isotope.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/imagesloaded.min.js') }}"></script>
		<script src="{{ asset('front/assets/js/main.js') }}"></script>
    </head>
    <body>

        <!-- ========================= header start ========================= -->
        <header class="header navbar-area bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
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
                                        <a class="page-scroll active" href="{{ route('home') }}">Home</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#about">About</a>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#alur-tiketing">Alur Tiketing</a>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#portfolio">FAQS</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                                <!-- <div class="header-btn">
                                    <a href="javascript:void(0)" class="theme-btn">Get Started</a>
                                </div> -->


                            </div> <!-- navbar collapse -->
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
                                
                                <!-- button profile -->
                                <ul class="sign-in">
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="lni lni-user"></i> My Account</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('home.profile') }}"><i class="lni lni-briefcase"></i>Profil</a>
                                        <a class="dropdown-item" href="{{ route('home.akun') }}"><i class="lni lni-rocket"></i> Akun</a>
                                        <a class="dropdown-item logout-btn" id="logoutButton" href="#"><i class="lni lni-close"></i>Logout</a>
                                    </div>
                                    </li>
                                </ul>

                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        
        </header>
        <!-- ========================= header end ========================= -->

        <!-- ========================= page-banner-section start ========================= -->
        <section class="page-banner-section pt-75 pb-75 img-bg" style="background-image: url('assets/img/bg/common-bg.svg')">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="banner-content">
                            <h2 class="text-white">Frequently Asked Questions</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)"></a>Home</li>
                                        <li class="breadcrumb-item active" aria-current="page">FAQS</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========================= page-banner-section end ========================= -->
        
       <!-- Search Bar -->
       <div class="search-container pt-20 col-lg-8 col-md-10 col-12 ms-lg-2 custom-padding">
                <input type="text" id="searchBar" class="form-control" placeholder="Cari pertanyaan..." onkeyup="searchFAQ()">
            </div>
           <!-- Start Faq Area -->
        <div class="faq section pt-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-general" role="tabpanel">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne1">
                                            <button class="accordion-button faq-question" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                                <span>Bagaimana cara mendaftar pada sistem ticketing ?</span><i class="lni lni-chevron-down"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseOne1" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne1" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor.</p>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                                    repellat autem dolor expedita minima quidem vero ipsa ea tempore dolorem
                                                    nobis eius, modi molestiae dignissimos assumenda aliquid molestias
                                                    adipisci veritatis!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo2">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo2"
                                                aria-expanded="false" aria-controls="collapseTwo2">
                                                <span>Apa Perbedaan masuk  menggunakan login dengan kirim cepat ?</span><i
                                                    class="lni lni-chevron-down"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseTwo2" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo2" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor.</p>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                                    repellat autem dolor expedita minima quidem vero ipsa ea tempore dolorem
                                                    nobis eius, modi molestiae dignissimos assumenda aliquid molestias
                                                    adipisci veritatis!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree3">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree3"
                                                aria-expanded="false" aria-controls="collapseThree3">
                                                <span>Apa berdanya status ticket Open, Processed, dan closed ?</span><i
                                                    class="lni lni-chevron-down"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseThree3" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree3" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor.</p>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                                    repellat autem dolor expedita minima quidem vero ipsa ea tempore dolorem
                                                    nobis eius, modi molestiae dignissimos assumenda aliquid molestias
                                                    adipisci veritatis!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour4">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour4"
                                                aria-expanded="false" aria-controls="collapseFour4">
                                                <span>Bagaimana cata mendaftar pada sistem ticketing ?</span><i
                                                    class="lni lni-chevron-down"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseFour4" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour4" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor.</p>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                                    repellat autem dolor expedita minima quidem vero ipsa ea tempore dolorem
                                                    nobis eius, modi molestiae dignissimos assumenda aliquid molestias
                                                    adipisci veritatis!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive5">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFive5"
                                                aria-expanded="false" aria-controls="collapseFive5">
                                                <span>Apa yang harus dilakukan apabila tiket sudah diakhiri tapi pekerjaan belum selesai sepenuhnya ?</span><i
                                                    class="lni lni-chevron-down"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseFive5" class="accordion-collapse collapse"
                                            aria-labelledby="headingFive5" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor.</p>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                                    repellat autem dolor expedita minima quidem vero ipsa ea tempore dolorem
                                                    nobis eius, modi molestiae dignissimos assumenda aliquid molestias
                                                    adipisci veritatis!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSix6">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSix6"
                                                aria-expanded="false" aria-controls="collapseSix6">
                                                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span><i
                                                    class="lni lni-chevron-down"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseSix6" class="accordion-collapse collapse"
                                            aria-labelledby="headingSix6" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor.</p>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                                    repellat autem dolor expedita minima quidem vero ipsa ea tempore dolorem
                                                    nobis eius, modi molestiae dignissimos assumenda aliquid molestias
                                                    adipisci veritatis!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSeven7">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSeven7"
                                                aria-expanded="false" aria-controls="collapseSeven7">
                                                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span><i
                                                    class="lni lni-chevron-down"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseSeven7" class="accordion-collapse collapse"
                                            aria-labelledby="headingSeven7" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor.</p>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                                    repellat autem dolor expedita minima quidem vero ipsa ea tempore dolorem
                                                    nobis eius, modi molestiae dignissimos assumenda aliquid molestias
                                                    adipisci veritatis!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pagination -->
                                <div class="pagination left">
                                    <ul class="pagination-list">
                                        <li><a href="javascript:void(0)">1</a></li>
                                        <li class="active"><a href="javascript:void(0)">2</a></li>
                                        <li><a href="javascript:void(0)">3</a></li>
                                        <li><a href="javascript:void(0)">4</a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                                <!--/ End Pagination -->
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
             <!--/ End Faq Area -->

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
                <link rel="stylesheet" href="{{ asset('front/assets/css/LineIcons.2.0.css') }}">
                <link rel="stylesheet" href="{{ asset('front/assets/css/animate.css') }}">
                <script src="{{ asset('front/assets/js/bootstrap.bundle-5.0.0.alpha-min.js') }}"></script>
                <script src="{{ asset('front/assets/js/contact-form.js') }}"></script>
                <script src="{{ asset('front/assets/js/count-up.min.js') }}"></script>
                <script src="{{ asset('front/assets/js/tiny-slider.js') }}"></script>
                <script src="{{ asset('front/assets/js/isotope.min.js') }}"></script>
                <script src="{{ asset('front/assets/js/glightbox.min.js') }}"></script>
                <script src="{{ asset('front/assets/js/wow.min.js') }}"></script>
                <script src="{{ asset('front/assets/js/imagesloaded.min.js') }}"></script>
                <script src="{{ asset('front/assets/js/main.js') }}"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


            <!-- Bootstrap JavaScript and dependencies -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
    </body>