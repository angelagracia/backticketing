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
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css"> -->
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
                                        <a class="page-scroll active" href="{{ route('home') }}">Home</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#services">Alur ticketing</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('faqs_login') }}">FAQS</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#team">Team</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('home.contact_login') }}">Contact</a>
                                    </li>
                                </ul>
                                <!-- <div class="header-btn">
                                    <a href="javascript:void(0)" class="theme-btn">Get Started</a>
                                </div> --
                            </div> navbar collapse -->
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
                                        <a class="dropdown-item" href="{{ route('profile') }}"><i class="lni lni-briefcase"></i>Profil</a>
                                        <a class="dropdown-item" href="{{ route('akun') }}"><i class="lni lni-rocket"></i> Akun</a>
                                        <!-- <a class="dropdown-item" href="#"><i class="lni lni-close"></i>Logout</a> -->
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

        <!--===========================form isian ==========================-->
        <div class="container">
            <div class="alert" role="alert" style="background-color: #D1F8EF; color: black;">
                <strong>Sebelum mengirimkan, mohon pastikan:</strong><br>
                <span style="color: red;">*</span> Semua yang bertanda bintang wajib diisi.<br>
                <span style="color: red;">*</span> Semua informasi adalah benar dan bebas dari kesalahan.
            </div>
            <div class="form-container-inputform">
                <form  name="input_kc" action="{{ route('ticket.prosesUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-box">
                            <label for="name">Nama</label><span class="required"></span>
                            <input type="text" name="nama" id="name" class="required" value="{{ $ticket->name }}" required>
                        </div>
                        <div class="input-box">
                            <label for="title">Judul</label><span class="required"></span>
                            <input type="text" name="judul" id="title" class="required" value="{{ $ticket->title }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-box half-width">
                          <label for="email">Email</label><span class="required"></span>
                          <input type="email" name="email" id="email" class="required" value="{{ $ticket->email }}" required>

                          <label for="unit_kerja" class="mt-4">Unit Kerja</label><span class="required"></span>
                          <select id="unit_kerja" name="unit_kerja" class="form-select" required>
                              <option value="">Pilih Unit Kerja</option>
                              @foreach($unit_kerja as $unit_kerja)
                              <option value="{{ $unit_kerja->id }}" {{ $ticket->unit_kerja_id == $unit_kerja->id ? 'selected' : '' }}>{{ $unit_kerja->name }}</option>
                              @endforeach
                          </select>

                        </div>
                        <div class="input-box half-width">
                          <label for="description">Deskripsi</label><span class="required"></span>
                          <textarea name="deskripsi" id="description" class="required" rows="3">{{ $ticket->req_description }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-box">
                            <label for="phone">No. telepon</label><span class="required"></span>
                            <input type="text" name="no_telepon" id="phone" class="required" value="{{ $ticket->telepon }}">

                            <label for="unit" class="mt-4">Peran</label><span class="required"></span>
                            <select id="unit" name="unit" class="form-select" required>
                                <option value="">Pilih Peran</option>
                                @foreach($master_unit as $unit)
                                    <option value="{{ $unit->id }}" {{ $ticket->unit_id == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                                @endforeach
                            </select>
                            <label for="category" class="mt-4">Kategori</label><span class="required"></span>
                            <select id="category" name="category" class="form-select" required onchange="checkCategory()">
                                <option value="">Pilih Kategori</option>
                                @foreach($topic_master as $category)
                                <option value="{{ $category->id }}" {{ $ticket->topic_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <label for="sub_category" class="mt-4">Sub Kategori</label><span class="required"></span>
                            <select id="sub_category" name="sub_category" class="form-select" required>
                                <option value="">Pilih Sub Kategori</option>
                                @foreach($master_type as $sub_kategory)
                                <option value="{{ $sub_kategory->id }}" {{ $ticket->type_id == $sub_kategory->id ? 'selected' : '' }}>{{ $sub_kategory->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Lampiran Lama:</label>
                                @foreach ($ticket->attachments as $attachment)
                                    <div>
                                        <img src="{{ asset('storage/' . $attachment->file_path) }}" alt="Lampiran" style="max-width: 150px; max-height: 150px; display: block;">
                                        <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">{{ $attachment->file_name }}</a>
                                        <input type="checkbox" name="delete_lampiran[]" value="{{ $attachment->id }}"> Hapus
                                    </div>
                                @endforeach
    
                            </div>
                            <label for="lampiran">Lampiran (Bisa Upload Banyak File)</label>
                            <input type="file" name="lampiran[]" id="lampiran" class="form-control" multiple>
                        </div>
                    
                        {{-- Tampilkan Lampiran Lama --}}
                    </div>
                    <input type="hidden" name="id" value="{{ $ticket->id }}">
                    <div class="button-container">
                        <button type="submit" class="btn btn-primary" id="swal-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
           
        
                <!--===========================form isian end =========================-->

                 <!-- ========================= footer start ========================= -->
                 <footer class="footer pt-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="footer-widget mb-60 wow fadeInLeft" data-wow-delay=".2s">
                                    <a href="{{ route('index') }}" class="logo mb-30"><img src="{{ asset('front/assets/img/logo-isi-black.svg') }}" alt="logo"></a>
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
                <script src="{{ asset('front/assets/js/input_form.js') }}"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <!-- jQuery -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
                <!-- <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script> -->
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

                <script>
                    document.getElementById("permohonanBtn").addEventListener("click", function(event) {
                        var fileInput = document.getElementById("fileInput"); // Ambil input file
                        var lampiranBintang = document.getElementById("lampiranBintang"); // Tanda bintang
                        var lampiranLabel = document.getElementById("lampiranLabel"); // Label lampiran
                        
                        if (fileInput.files.length === 0) { 
                            alert("Lampiran harus diisi!");
                            
                            // Tambah efek agar pengguna tahu lampiran wajib diisi
                            lampiranLabel.style.color = "red";
                            lampiranBintang.style.fontWeight = "bold";
                    
                            // Mencegah form terkirim
                            event.preventDefault();
                        } else {
                            // Kembalikan ke normal jika sudah diisi
                            lampiranLabel.style.color = "black";
                            lampiranBintang.style.fontWeight = "normal";
                        }
                    });
                </script>
                    
               

                {{-- <script>
                   document.getElementById("swal-2").addEventListener("click", function() {
                        Swal.fire({
                            title: 'Data Berhasil Dikirim!',
                            text: 'Anda akan dialihkan dalam beberapa detik...',
                            icon: 'success',
                            timer: 3000,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            timerProgressBar: true 
                        });
                
                        setTimeout(() => {
                            window.location.href = "{{ route('') }}";
                        }, 3000); 
                    });
               </script> --}}
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
                        document.addEventListener("DOMContentLoaded", function () {
                            let labels = document.querySelectorAll("label");
                            let categorySelect = document.getElementById("category");
                            let lampiranBintang = document.getElementById("lampiranBintang");
                            let fileInput = document.getElementById("fileInput");

                            // Fungsi untuk menambahkan tanda * ke semua input yang wajib diisi, kecuali "Lampiran"
                            labels.forEach(label => {
                                if (label.textContent.trim().endsWith(" *") || label.id === "lampiranLabel") return; // Cegah duplikasi bintang pada "Lampiran"
                                let star = document.createElement("span");
                                star.innerHTML = " *";
                                star.style.color = "red";
                                label.appendChild(star);
                            });

                            // Fungsi untuk cek apakah kategori "Permohonan" dipilih
                            function checkCategory() {
                                if (categorySelect.value === "3") { // "3" adalah kode untuk Permohonan
                                    lampiranBintang.style.display = "inline"; // Tampilkan tanda bintang
                                } else {
                                    lampiranBintang.style.display = "none"; // Sembunyikan tanda bintang
                                }
                            }

                            // Jalankan saat dropdown kategori berubah
                            categorySelect.addEventListener("change", checkCategory);
                            checkCategory(); // Panggil sekali saat halaman pertama kali dimuat
                        });

                    </script>
    

                
    </body>
</html>