<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ticketing | ISI Yogyakarta</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo/icon-isi.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- ========================= CSS here ========================= -->
		<link rel="stylesheet" href="{{ asset('../front/assets/css/bootstrap-5.0.0-alpha.min.css') }}">
        <link rel="stylesheet" href="{{ asset('../front/assets/css/LineIcons.2.0.css') }}">
		<link rel="stylesheet" href="{{ asset('../front/assets/css/animate.css') }}">
		<link rel="stylesheet" href="{{ asset('../front/assets/css/tiny-slider.css') }}">
		<link rel="stylesheet" href="{{ asset('../front/assets/css/glightbox.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../front/assets/css/main.css') }}">
		<link rel="stylesheet" href="{{ asset('style.css') }}">

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
                                <img src="{{ asset('front/assets/img/logo/logo-ticketing.svg') }}" alt="Logo">
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
                                        <a class="page-scroll active" href="dashboard/home.html">Home</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#about">About</a>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#alur-tiketing">Alur Tiketing</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#portfolio">FAQS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="contact_login.html">Contact</a>
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
                                    <a class="nav-link dropdown-toggle" href="profile.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="lni lni-user"></i> My Account</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="profile.html"><i class="lni lni-briefcase"></i>Profil</a>
                                        <a class="dropdown-item" href="akun.html"><i class="lni lni-rocket"></i> Akun</a>
                                        <a class="dropdown-item logout-btn" id="logoutButton" href="#"><i class="lni lni-close"></i>Keluar</a>
                                    </div>
                                    </li>
                                </ul>
                                
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        
        </header>
        <!-- ========================= header end ========================= -->


        <!-- Start Content -->
    <div id="content" class="section-padding">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3 page-sidebar">
              <aside>
                <div class="sidebar-box mt-100">
                  <!-- <div class="user">
                    <figure>
                      <a href="#"><img src="assets/img/author/img1.jpg" alt=""></a>
                    </figure>
                    <div class="usercontent">
                      <h3>User</h3>
                      <h4>Administrator</h4>
                    </div>
                  </div> -->
                </div>
              </aside>
            </div>
  
            <div class="col-sm-12 col-md-8 col-lg-9">
              <div class="row page-content">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="inner-box">
                            <div class="dashboard-box">
                                <h2 class="dashbord-title">Ubah Profil</h2>
                            </div>
                        <div class="dashboard-wrapper">
                            <div class="container">
                                    <!-- Foto Diri -->
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Foto Diri</strong></label>
                                        <div class="d-flex align-items-center">
                                            <div class="profile-photo me-3">
                                                <img id="profileImage" src="{{ asset('../front/assets/img/client-logo/avatar-1.png') }}" alt="Foto Profil" width="110" height="110" style="border-radius: 0%; object-fit: cover; border: 1px solid #ccc;">
                                            </div>
                                            <input type="file" id="fileInput" accept="image/*" style="display: none;">
                                            <button class="btn btn-dark ml-3" onclick="document.getElementById('fileInput').click();">Pilih Foto</button>
                                        </div>
                                        <small class="text-muted">Gambar Profile Anda sebaiknya memiliki rasio 1:1 dan tidak lebih dari 2MB.</small>
                                    </div>
                                    
                                    <script>
                                    document.getElementById("fileInput").addEventListener("change", function(event) {
                                        const file = event.target.files[0];
                                        if (file) {
                                            if (file.size > 2 * 1024 * 1024) {
                                                alert("Ukuran gambar tidak boleh lebih dari 2MB!");
                                                return;
                                            }
                                            
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                document.getElementById("profileImage").src = e.target.result;
                                            };
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                    </script>
                                    
                            
                                    <!-- Nama Lengkap -->
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Nama Lengkap *</strong></label>
                                        <input type="text" class="form-control" value="Ahmad Shoffian">
                                    </div>
                            
                                    <!-- Username -->
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Nama Pengguna *</strong></label>
                                        <input type="text" class="form-control" value="ahmad_shoffian_6zdl">
                                    </div>
                            
                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Email</strong></label>
                                        <input type="email" class="form-control bg-light" value="ahmadshof45@gmail.com" readonly>
                                        <small class="text-muted">Anda dapat mengubah alamat email melalui menu <a href="akun.html">Akun</a>.</small>
                                    </div>

                                    <button class="btn btn-common mt-1 btn-primary" type="button" style="width: 140px; margin-right: auto; margin-left: 10px;" onclick="simpanData()">Ubah Profil</button>

                            </div>
                        </div>
                    </div>
                      
                </div>
            </div>
        </div>
            </div>
            
          </div>  
        </div>      
      </div>
      <!-- End Content -->

        
        <!-- ========================= footer start ========================= -->
        <footer class="footer pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-widget mb-60 wow fadeInLeft" data-wow-delay=".2s">
                            <a href="index.html" class="logo mb-30"><img src="../assets/img/logo-isi-black.svg" alt="logo"></a>
                            <p class="mb-30 footer-desc">We Crafted an awesome desig library that is robust and intuitive to use. No matter you're building a business presentation websit.</p>
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
                            <div class="heading">
                                <h3>Login From Here</h3>
                                <p>Log in to continue your account <br> and explore new jobs.</p>
                            </div>
                            <!-- <div class="social-login">
                                <ul>
                                    <li><a class="linkedin" href="#"><i class="lni lni-linkedin-original"></i> Log in
                                            with LinkedIn</a></li>
                                    <li><a class="google" href="#"><i class="lni lni-google"></i> Log in with
                                            Google</a></li>
                                    <li><a class="facebook" href="#"><i class="lni lni-facebook-original"></i> Log in
                                            with Facebook</a></li>
                                </ul>
                            </div> -->
                            <div class="or-devider">
                                <span>Or</span>
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
                                <div class="form-group d-flex flex-wrap justify-content-between">
                                    <!-- Default checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">Remember password</label>
                                    </div>
                                    <a href="" class="font-size-3 text-dodger line-height-reset">Forget Password</a>
                                </div>
                                <div class="form-group mb-8 button">
                                    <button class="btn ">Log in
                                    </button>
                                </div>
                                <p class="text-center create-new-account">Don't have an account? <a href="#" data-toggle="modal" data-target="#signup" data-dismiss="modal">Create a free account</a></p>
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
                            <div class="heading">
                                <h3>Create a free Account <br> Today</h3>
                                <p>Create your account to continue <br> and explore new jobs.</p>
                            </div>
                            <!-- <div class="social-login">
                                <ul>
                                    <li><a class="linkedin" href="#"><i class="lni lni-linkedin-original"></i> Import from LinkedIn</a></li>
                                    <li><a class="google" href="#"><i class="lni lni-google"></i> Import from
                                            Google</a></li>
                                    <li><a class="facebook" href="#"><i class="lni lni-facebook-original"></i> Import from Facebook</a></li>
                                </ul>
                            </div> -->
                            <div class="or-devider">
                                <span>Or</span>
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
                                    <label for="password" class="label">Confirm Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control"
                                            placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="form-group d-flex flex-wrap justify-content-between">
                                    <!-- Default checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <label class="form-check-label" for="flexCheckDefault">Agree to the <a
                                                href="#">Terms & Conditions</a></label>
                                    </div>
                                </div>
                                <div class="form-group mb-8 button">
                                    <button class="btn ">Sign Up
                                    </button>
                                </div>
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
		<script src="{{ asset('../front/assets/js/bootstrap.bundle-5.0.0.alpha-min.js') }}"></script>
		<script src="{{ asset('../front/assets/js/contact-form.js') }}"></script>
        <script src="{{ asset('../front/assets/js/count-up.min.js') }}"></script>
        <script src="{{ asset('../front/assets/js/tiny-slider.js') }}"></script>
        <script src="{{ asset('../front/assets/js/isotope.min.js') }}"></script>
        <script src="{{ asset('../front/assets/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('../front/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('../front/assets/js/imagesloaded.min.js') }}"></script>
		<script src="{{ asset('../front/assets/js/main.js') }}"></script>
        <!-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> -->
        <!-- <script>
            CKEDITOR.replace( 'ckeditor' );
        </script> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            window.location.href = "../index.html"; // Redirect ke halaman login
                        }, 2000);
                    }
                });
            });
        </script>

        <script>
            function simpanData() {
                // Simulasi penyimpanan data (bisa diganti dengan AJAX atau lainnya)
                setTimeout(() => {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Data berhasil disimpan.",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 2000, // Otomatis tertutup setelah 2 detik
                        timerProgressBar: true
                    });
                }, 500); // Simulasi delay
            }
        </script>

        <script>
            document.getElementById("logout1").addEventListener("click", function (event) {
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
                            window.location.href = "../index.html"; // Redirect ke halaman login
                        }, 2000);
                    }
                });
            });
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
