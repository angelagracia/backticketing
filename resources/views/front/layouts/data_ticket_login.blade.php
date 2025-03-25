<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ticketing | ISI Yogyakarta</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{asset('front/assets/img/logo/icon-isi.png')}}">
        <!-- Place favicon.ico in the root directory -->
        
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
        <!-- ========================= header start ========================= -->
        <header class="header navbar-area bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{route('index')}}">
                                <img src="{{asset('front/assets/img/logo/logo-new.svg')}}" alt="Logo">
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
                                        <a class="page-scroll" href="{{route('faqs_login')}}">FAQS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{route('home.contact_login')}}">Contact</a>
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
                                        <a class="dropdown-item" href="{{route('profile')}}"><i class="lni lni-briefcase"></i>Profil</a>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="lni lni-rocket"></i> Akun</a>
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

        <!-- =============== main content start =============== -->
        <div class="container">
            <div class="card shadow-sm p-4">
                <h4 class="mb-4">Data Tiket
                    <button class="btn-data-tiket-chat" data-bs-toggle="modal" data-bs-target="#chatTiketModal">Chat</button>
                    <a href="{{ route('detail_ticket_login', ['id' => $ticket->id]) }}">
                        <button class="btn-data-tiket-detail">Detail</button>
                    </a>                    
                    <a href="{{ route('ticketlogin.edit', $ticket->id) }}">
                        <button class="btn-edit-ticket-hidup">Edit</button>
                    </a>
                    
                </h4>
                <div class="row content-section">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 left-desc">
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
                                <span class="text-muted">{{ $ticket->unit->name }}</span>
                            </p>
                        </div>
                        <div class="d-flex align-items-center mb-2 tiket-desc">
                            <p class="fw-bold text-start text-label">Kategori</p>
                            <p class="fw-bold colon">:</p>
                            <p class="text-value">{{ $ticket->topic->name }}</p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =============== main content end =============== -->


        <!-- ========================= footer start ========================= -->
        <footer class="footer mt-75">
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
        
                <div class="row align-items-center">>
                    <div class="copyright-area">
                        <p class="mb-0 text-black text-center">Copyright © 2025. UPA. Teknologi Informasi dan Komunikasi</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ========================= footer end ========================= -->
        
        
        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top">
            <i class="lni lni-arrow-up"></i>
        </a>

        <!-- ========================= Chat Start ========================= -->
        <div class="modal fade" id="chatTiketModal" tabindex="-1" aria-labelledby="chatTiketModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Live Chat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="chat-container">
                            <div class="chat-message received">
                                <div class="message-text">Halo, bisa bantu edit gambar ini?</div>
                                <div class="chat-timestamp">10:00 AM</div>
                            </div>
                            <div class="chat-message sent">
                                <div class="message-text">Tentu! Saya siap membantu.</div>
                                <div class="chat-timestamp">10:01 AM</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="chat-input-container">
                            <input type="text" class="form-control" id="chatInput" placeholder="Ketik pesan...">
                            <small class="text-muted"><span style="color:red;">*</span> Dokumen harus berukuran kurang dari 2MB</small>
                        </div>
                        <label for="fileUpload" class="upload-icon">
                            <i class="lni lni-upload"></i>
                        </label>
                        <input type="file" id="fileUpload" style="display: none;">
                        <button class="btn" id="sendChat">
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================= Chat End ========================= -->
        
        <!-- ========================= Edit Tiket Start ===================== -->
        <div class="modal fade" id="editTiketModal" tabindex="-1" aria-labelledby="editTicketModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- Tombol kembali -->
                        <button type="button" class="btn btn-link text-dark" data-bs-dismiss="modal">
                            <i class="Ini Ini-arrow-left"></i>
                        </button>
                        <h5 class="modal-title mx-auto" id="editTicketModalLabel">Edit Tiket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="editTicketForm" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="input-box">
                                    <input type="hidden" id="ticket_id" name="ticket_id">
                                    <label for="name">Nama <span class="required"></span></label>
                                    <input type="text" name="nama" id="name" class="required" placeholder="Masukkan Nama" readonly>
                                </div>
                                <div class="input-box">
                                    <label for="title">Judul <span class="required"></span></label>
                                    <input type="text" id="title" name="judul" class="required" placeholder="Masukkan Judul">
                                </div>
                            </div>
        
                            <div class="form-group">
                                <div class="input-box half-width">
                                    <label for="email">Email <span class="required"></span></label>
                                    <input type="email" id="email" name="email" class="required" placeholder="Masukkan Email" readonly>
            
                                    <label for="role" class="mt-4">Unit Kerja <span class="required"></span></label>
                                    <select id="unit_kerja" name="unit_kerja" class="form-select required" disabled>
                                        <option value="">Pilih Unit Kerja</option>
                                        <option value="1">Biro Perencanaan, Keuangan, dan Umum</option>
                                        <option value="2">Biro Akademik, Kemahasiswaan, dan Kerja Sama</option>
                                        <option value="3">Fakultas Seni Pertunjukan</option>
                                        <option value="4">Fakultas Seni Rupa dan Desain</option>
                                        <option value="5">Fakultas Seni Media Rekam</option>
                                        <option value="6">Program Pascasarjana</option>
                                        <option value="7">Lembaga Penelitian dan Pengabdian Masyarakat</option>
                                        <option value="8">Lembaga Penjaminan Mutu dan Pengembangan Pembelajaran</option>
                                        <option value="9">UPA Teknologi Informasi dan Komunikasi</option>
                                        <option value="10">UPA Galeri dan Koleksi Seni</option>
                                        <option value="12">UPA Bahasa</option>
                                        <option value="12">UPA Pertunjukan Seni</option>
                                        <option value="13">UPA Pengembangan Karir dan Kewirausahaan</option>
                                        <option value="14">UPA  Layanan Uji Kompetensi</option>
                                        <option value="15">Satuan Pengawas Internal</option>
                                    </select>
        
                                </div>
                                <div class="input-box half-width">
                                    <label for="description">Deskripsi <span class="required"></span></label>
                                    <textarea id="description" name="deskripsi" class="required" rows="3" placeholder="Masukkan Deskripsi"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-box">
                                    <label for="phone">No. telepon <span class="required"></span></label>
                                    <input type="text" id="phone" name="no_telepon" class="required" placeholder="Masukkan No. Telepon" readonly>
        
                                    <label for="role" class="mt-4">Peran <span class="required"></span></label>
                                    <select id="unit" name="unit" class="form-select required" disabled>
                                        <option value="">Pilih Peran</option>
                                        <option value="1">Rektorat</option>
                                        <option value="2">Dekanat</option>
                                        <option value="3">Dosen</option>
                                        <option value="4">Biro</option>
                                        <option value="5">Mahasiswa</option>
                                        <option value="6">Tendik</option>
                                        <option value="7">Umum</option>
                                    </select>

                                    <label for="category" class="mt-4">Kategori <span class="required"></span></label>
                                    <select id="category" name="category" class="form-select required" onchange="checkCategory()">
                                        <option value="">Pilih Kategori</option>
                                        <option value="1">Perbaikan</option>
                                        <option value="2">Penambahan</option>
                                        <option value="3">Permohonan</option>
                                        <option value="4">Pemeliharaan</option>
                                    </select>

                                    <label for="subcategory" class="mt-4">Sub Kategori <span class="required"></span></label>
                                    <select id="subcategory" name="sub_category" class="form-select required">
                                        <option value="">Pilih Sub Kategori</option>
                                        <option value="1">Perbaikan Jaringan</option>
                                        <option value="2">Penambahan Bandwidth</option>
                                        <option value="3">Pemasangan Jaringan</option>
                                        <option value="4">Perbaikan Komputer</option>
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
                            <!-- Tombol Simpan & Batal -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary px-4">Simpan</button>
                                <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================= Edit Tiket End ===================== -->

        <!-- ========================= JS here ========================= -->
                <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
                <!-- <script src="assets/js/bootstrap.bundle-5.0.0.alpha-min.js"></script> -->
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

                    </script>
                <!-- <script>
                    $(document).ready(function() {
                        $("#toastr-2").click(function() {
                            console.log("Button clicked!"); // Debugging untuk memastikan event berjalan
                            iziToast.success({
                                title: 'Hello, world!',
                                message: 'This awesome plugin is made by iziToast',
                                position: 'topRight'
                            });
                        });
                    });
                </script> -->

                {{-- <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        let editButtons = document.querySelectorAll(".btn-edit-ticket-hidup");

                        editButtons.forEach(button => {
                            button.addEventListener("click", function () {
                                // Ambil data dari atribut data-*
                                let ticketId = this.getAttribute("data-id");
                                let name = this.getAttribute('data-name');
                                let title = this.getAttribute("data-title");
                                let description = this.getAttribute("data-description");
                                let email = this.getAttribute("data-email");
                                let phone = this.getAttribute("data-phone");
                                let unitKerja = this.getAttribute("data-unit-kerja");
                                let unit = this.getAttribute("data-unit");
                                let category = this.getAttribute("data-category");
                                let subCategory = this.getAttribute("data-sub-category");

                                // Masukkan ke dalam form modal
                                document.getElementById("ticket_id").value = ticketId;
                                document.getElementById("name").value = name;
                                document.getElementById("title").value = title;
                                document.getElementById("description").value = description;
                                document.getElementById("email").value = email;
                                document.getElementById("phone").value = phone;
                                document.getElementById("unit").value = unit; // Unit peran
                                document.getElementById("unit_kerja").value = unitKerja; // Unit kerja
                                document.getElementById("category").value = category; // Kategori
                                document.getElementById("subcategory").value = subCategory; // Sub kategori

                                // Update form action untuk update
                                document.getElementById("editTicketForm").action = `/ticket/${ticketId}/update`;
                            });
                        });
                    });
                </script> --}}
    </body>
</html>