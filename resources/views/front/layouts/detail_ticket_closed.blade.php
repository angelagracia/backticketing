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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- ========================= header start ========================= -->
        <header class="header navbar-area bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ route('index') }}">
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
                                        <a class="page-scroll active" href="{{route('home')}}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{route('home/faqs_login')}}">FAQS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{route('home/contact_login')}}">Contact</a>
                                    </li>
                                </ul>
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


        <div class="container pt-20">
            <div class="card shadow-sm p-4">
                <h4 class="mb-4">Detail Tiket</h4>
                <div class="row content-section">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 left-desc">
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">No. Tiket</p>
                            <p class="fw-bold colon">:</p>
                            <p class="text-value">009992812</p>
                        </div>
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Nama</p>
                            <p class=" fw-bold colon">:</p>
                            <p class="text-value mb-0">
                                Irenne Dwi Natalia <br>
                                <span class="text-muted">Tendik</span>
                            </p>
                        </div>
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Kategori</p>
                            <p class="fw-bold colon">:</p>
                            <p class="text-value">Perbaikan</p>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4 right-desc">
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Status</p>
                            <p class="fw-bold colon">:</p>
                            <p class="text-value"><span class="status-badge status-closed">Closed</span></p>
                        </div>
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Tanggal/Waktu</p>
                            <p class="fw-bold colon">:</p>
                            <p class="text-value">30/12/2024 13:30</p>
                        </div>
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Lampiran</p>
                            <p class="fw-bold colon">:</p>
                            <p class="text-value"><a href="#">screen-shot-1.jpg</a></p>
                        </div>
                    </div> 
                </div>

                <hr class="divider">
                <div class="row content-section">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Judul</p>
                            <p class="fw-bold colon">:</p>
                            <p class="text-value">Perbaikan Printer</p>
                        </div>
                    </div>
                </div>
                <div class="row content-section">
                    <div class="col-md-1"></div>
                    <div class="col-md-11 mb-4">
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Deskripsi</p>
                            <p class="fw-bold colon">:</p>
                        </div>
                        <p class="d-flex align-items-center mb-2 tiket-desc">Ketika saya menggunakan printer Epson untuk mencetak dokumen, LED printer selalu berwarna merah dan menampilkan peringatan.</p>
                    </div>
                </div>
            
                <hr class="divider">
                <h5 class="mb-4">Riwayat Pekerjaan</h5>
                <div class="history-box p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <p>[12-02-2025 / 09:30:45] <strong>Ticket Status:</strong> <span class="text-success">Open</span></p>
                            <div class="row content-section">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <ul class="ul-with-bullet">
                                        <li>Pengguna mengajukan permohonan</li>
                                    </ul>
                                </div>
                            </div>
                            <p>[12-02-2025 / 09:35:09] <strong>Ticket Edited by User</strong></p>
                            <div class="row content-section">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <ul class="ul-with-bullet">
                                        <li>Pengguna mengubah permohonann</li>
                                    </ul>
                                </div>
                            </div>
                            <p>[12-02-2025 / 13:30:30] <strong>Ticket Status:</strong> <span class="text-warning">Processed</span></p>
                            <div class="row content-section">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <ul class="ul-with-bullet">
                                        <li>Permohonan sedang diproses</li>
                                    </ul>
                                </div>
                            </div>
                            <p>[12-02-2025 / 15:02:23] <strong>Ticket Confirmation</strong></p>
                            <div class="row content-section">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <ul class="ul-with-bullet">
                                        <li>Permohonan selesai diproses.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-30">
                            <p class="close-messages text-danger">
                                * Silakan klik tombol CHAT apabila masih ada pertanyaan <br>
                            </p>
                            <p class="close-messages text-danger">
                                * Silakan Klik tombol CLOSE TICKET apabila sudah selesai
                            </p>
                        </div>
                    </div>
                </div>
                
                <button class="btn-ticket-closed">Ticket Closed</button>
            </div>
        </div>

        <!-- ========================= footer start ========================= -->
        <footer class="footer pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-widget mb-60 wow fadeInLeft" data-wow-delay=".2s">
                            <a href="{{ route('index') }}" class="logo mb-30"><img src="{{ asset('front/assets/img/logo-isi-black.svg') }}" alt="logo"></a>
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
        <script src="{{ asset('front/assets/js/chat.js') }}"></script>
        <script src="{{ asset('front/assets/js/input_form.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        
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