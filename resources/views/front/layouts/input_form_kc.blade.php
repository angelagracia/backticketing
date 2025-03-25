<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ticketing | ISI yogyakarta</title>
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
        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"></head>
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
                                    <a class="page-scroll" href="#alur-tiketing">Alur Tiketing</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="page-scroll" href="{{ route('faqs') }}">FAQS</a>
                                </li>
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
                            <!-- <a href="input_form.html" class="btn">Kirim cepat</a> -->
                        </div>
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
                <form name="input_kc" action="{{ route('prosesSimpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-box">
                            <label for="name">Nama</label><span class="required"></span>
                            <input type="text" name="nama" id="name" class="required" placeholder="Masukkan Nama">
                        </div>
                        <div class="input-box">
                            <label for="title">Judul</label><span class="required"></span>
                            <input type="text" name="judul" id="title" class="required" placeholder="Masukkan Judul">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-box half-width">
                          <label for="email">Email</label><span class="required"></span>
                          <input type="email" name="email" id="email" class="required" placeholder="Masukkan Email">

                          <label for="unit_kerja" class="mt-4">Unit Kerja</label><span class="required"></span>
                          <select id="unit_kerja" name="unit_kerja" class="form-select" required>
                              <option value="">Pilih Unit Kerja</option>
                              @foreach($unit_kerja as $unit_kerja)
                                  <option value="{{ $unit_kerja->id }}">{{ $unit_kerja->name }}</option>
                              @endforeach
                          </select>

                        </div>
                        <div class="input-box half-width">
                          <label for="description">Deskripsi</label><span class="required"></span>
                          <textarea name="deskripsi" id="description" class="required" rows="3" placeholder="Masukkan Deskripsi"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-box">
                            <label for="phone">No. telepon</label><span class="required"></span>
                            <input type="text" name="no_telepon" id="phone" class="required" placeholder="Masukkan No. Telepon">

                            <label for="unit" class="mt-4">Peran</label><span class="required"></span>
                            <select id="unit" name="unit" class="form-select" required>
                                <option value="">Pilih Peran</option>
                                @foreach($peran as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                            <label for="category" class="mt-4">Kategori</label><span class="required"></span>
                            <select id="category" name="category" class="form-select" required onchange="checkCategory()">
                                <option value="">Pilih Kategori</option>
                                @foreach($kategori as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <label for="sub_category" class="mt-4">Sub Kategori</label><span class="required"></span>
                            <select id="sub_category" name="sub_category" class="form-select" required>
                                <option value="">Pilih Sub Kategori</option>
                                @foreach($sub_kategory as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="input-box">
                            <label class="form-label">Lampiran <span id="lampiranBintang" style="color:red;">*</span></label>
                            <div class="file-upload">
                                <div class="preview-box" id="previewBox">
                                    <span id="previewText">Preview File</span>
                                    <img id="previewImage" src="" alt="" style="display: none;">
                                    <a id="previewLink" href="#" target="_blank" style="display: none;">Lihat File</a>
                                    <div class="overlay" id="removeBtn" onclick="removeFile()" style="display: none;">Hapus</div>
                                </div>
                                <div class="upload-box">
                                    <span>Upload file</span>
                                    <input type="file" name="lampiran[]" id="fileInput" accept=".png,.jpg,.jpeg,.pdf" onchange="previewFile()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-primary">Kirim</button>
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
                
                

                {{-- <script>
                    document.getElementById("swal-6").addEventListener("click", function () {
                        Swal.fire({
                            title: "Pastikan Data Yang Di Inputkan Sudah Benar Dan Lengkap",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "YA",
                            cancelButtonText: "BATAL",
                            showDenyButton: false,
                            showConfirmButton: true,
                            showLoaderOnConfirm: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: "Berhasil Dikirim",
                                    text: "Data Berhasil Dikirim",
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false 
                                });
                                setTimeout(() => {
                                    window.location.href = "{{ route('detail_ticket_kc') }}";
                                }, 2000);
                            }
                        });
                    });

               </script> --}}

    <!-- Login Modal -->
    {{-- <div class="modal fade form-modal" id="login" tabindex="-1" aria-hidden="true">
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
                                    <a href="{{ route('forgetpassword') }}" class="font-size-3 text-dodger line-height-reset">Lupa Kata Sandi</a>
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
    </div> --}}
    <!-- End Login Modal -->

    <!-- Signup Modal -->
    {{-- <div class="modal fade form-modal" id="signup" tabindex="-1" aria-hidden="true">
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
                                    <label for="password" class="label">Kata Sandi</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control"
                                            placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="label">Konfirmasi Kata Sandi</label>
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
    </div> --}}
    <!-- End Signup Modal -->

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            let labels = document.querySelectorAll("label");
            let categorySelect = document.getElementById("category");
            let lampiranBintang = document.getElementById("lampiranBintang");
            let fileInput = document.getElementById("fileInput");

            // Fungsi untuk menambahkan tanda * ke semua input yang wajib diisi, kecuali "Lampiran"
            labels.forEach(label => {
                if (label.textContent.trim().endsWith("*") || label.id === "lampiranLabel") return; // Cegah duplikasi bintang pada "Lampiran"
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

    </script> --}}

    <script>
        document.getElementById("submissionForm").addEventListener("submit", function(event) {
        if (confirm("Yakin ingin mengirim?")) {
                this.submit(); // Pastikan form dikirim
            }
        });

    </script>
    </body>
</html>