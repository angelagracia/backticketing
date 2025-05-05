<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ticketing | ISI Yogyakarta</title>
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
		<link rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}">
    </head>
    <body>


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
                                        <a class="page-scroll active" href="{{ route('index') }}">Home</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#services">Alur ticketing</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('faqs') }}">FAQS</a>
                                    </li>
                                    <!-- <li class="nav-item">
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
                             <!-- button profile -->
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


        <div class="container ">
            <div class="card shadow-sm p-4">
                <h4 class="mb-4">Detail Tiket</h4>
                <div class="row content-section">
                    <div class="col-md-5 offset-md-1 left-desc">
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">No. Tiket</p>
                            <p class="fw-bold colon">:</p>
                            <p class="text-value">{{ ($ticket->ticket_number) }}</p>
                        </div>
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Nama</p>
                            <p class=" fw-bold colon">:</p>
                            <p class="text-value mb-0">
                                {{ $ticket->name }} <br>
                                <span class="text-muted">{{ $ticket->unit ? $ticket->unit->name : '-' }}</span>
                            </p>
                        </div>
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Kategori</p>
                            <p class="fw-bold colon">:</p>
                            <p class="text-value">{{ $ticket->topic ? $ticket->topic->name : '-' }}</p>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4 right-desc">
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Status</p>
                            <p class="fw-bold colon">:</p>
                            <p class="text-value"><span class="status-badge status-open">{{ $ticket->status->name }}</span></p>
                        </div>
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Tanggal/Waktu</p>
                            <p class="fw-bold colon">:</p>
                            <p class="text-value">{{ $ticket->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Lampiran</p>
                            <p class="fw-bold colon">:</p>
                            <p class="text-value">
                                @foreach($ticket->attachments as $attachment)
                                <div>
                                    @if(in_array(pathinfo($attachment->file_path, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg']))
                                        <img src="{{ asset('storage/' . $attachment->file_path) }}" alt="Lampiran" width="100">
                                    @else
                                        <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">Lihat Lampiran</a>
                                    @endif
                                </div>
                            @endforeach
                            
                            </p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
         <!-- ========================= footer start ========================= -->
         <footer class="footer pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-widget mb-60 wow fadeInLeft" data-wow-delay=".2s">
                            <a href="{{ route('index') }}" class="logo mb-30"><img src="assets/img/logo-isi-black.svg" alt="logo"></a>
                            <p class="mb-30 footer-desc">Institut Seni Indonesia Yogyakarta atau ISI Yogyakarta, berdiri sejak 23 Juli 1984, adalah Perguruan Tinggi Negeri Seni Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Republik Indonesia dengan berbagai bidang seni terlengkap dan terbaik di Indonesia.</p>
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
                    <div class="row align-items-center">
                        <div class="col-md-6">
                             <div class="footer-social-links">
                                <ul class="d-flex">
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-instagram-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <p class="wow fadeInUp" data-wow-delay=".3s">Template by <a
                                    href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                        </div> -->
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
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const logoutBtn = document.querySelector(".logout-btn");
                
                logoutBtn.addEventListener("click", function (event) {
                    event.preventDefault(); // Mencegah link langsung bekerja
                    
                    const confirmLogout = confirm("Are you sure you want to logout?");
                    if (confirmLogout) {
                        alert("You have successfully logged out!");
                        window.location.href = "index.html"; // Nanti ke Index
                    }
                });
            });
        </script>


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
                                <a href="forgetpassword.html" class="font-size-3 text-dodger line-height-reset">Lupa Password</a>
                            </div>
                            <div class="form-group mb-8 button" >
                                <button class="btn btn-primary"> <a href="dashboard/home.html">Log in</a>
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
                                <button class="btn btn-primary"><a href="#" data-toggle="modal" data-target="#login" data-dismiss="modal">Sign Up</a>
                                </button>
                            </div>
                            <p class="text-center create-new-account">Sudah memiliki Akun? <a href="#" data-toggle="modal" data-target="#login" data-dismiss="modal">Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Signup Modal -->


    </body>
</html>