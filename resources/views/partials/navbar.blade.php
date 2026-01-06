<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-0">
    <div class="container-fluid px-5">

        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('images/logo-bpr-ntb.png') }}" alt="BPR NTB" class="navbar-logo me-2">
        </a>

        <!-- TOGGLER (MOBILE SAJA) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto fw-semibold">

                <li class="nav-item">
                    <a class="nav-link text-danger" href="#">Beranda</a>
                </li>

                <!-- ================= PRODUK & LAYANAN ================= -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">
                        Produk & Layanan
                    </a>

                    <ul class="dropdown-menu dropdown-bpr">

                        <!-- TABUNGAN -->
                        <li class="dropdown-submenu">
                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                Tabungan
                                <span class="arrow">›</span>
                            </a>
                            <ul class="dropdown-menu dropdown-bpr">
                                <li><a class="dropdown-item" href="#">TabunganKu</a></li>
                                <li><a class="dropdown-item" href="#">Simbada</a></li>
                                <li><a class="dropdown-item" href="#">Tabungan Sukses</a></li>
                            </ul>
                        </li>

                        <!-- DEPOSITO -->
                        <li>
                            <a class="dropdown-item" href="#">Deposito</a>
                        </li>

                        <!-- PINJAMAN -->
                        <li class="dropdown-submenu">
                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                Pinjaman
                                <span class="arrow">›</span>
                            </a>
                            <ul class="dropdown-menu dropdown-bpr">
                                <li><a class="dropdown-item" href="#">Kredit Modal Kerja</a></li>
                                <li><a class="dropdown-item" href="#">Kredit Konsumtif</a></li>
                            </ul>
                        </li>

                        <!-- SIMULASI -->
                        <li class="dropdown-submenu">
                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                Simulasi
                                <span class="arrow">›</span>
                            </a>
                            <ul class="dropdown-menu dropdown-bpr">
                                <li>
                                    <a class="dropdown-item" href="{{ route('simulasi.deposito') }}">
                                        Simulasi Deposito
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('simulasi.kredit') }}">
                                        Simulasi Kredit
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- UMKM -->
                        <li>
                            <a class="dropdown-item" href="#">UMKM Mitra</a>
                        </li>

                    </ul>
                </li>

                <!-- ================= PERUSAHAAN ================= -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">
                        Perusahaan
                    </a>
                    <ul class="dropdown-menu dropdown-bpr">
                        <li><a class="dropdown-item" href="#">Sejarah</a></li>
                        <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="#">Budaya Perusahaan</a></li>
                        <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="#">Dewan Komisaris</a></li>
                        <li><a class="dropdown-item" href="#">Direksi</a></li>
                        <li><a class="dropdown-item" href="#">Tata Kelola Perusahaan</a></li>
                    </ul>
                </li>

                <!-- ================= JARINGAN ================= -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">
                        Jaringan
                    </a>
                    <ul class="dropdown-menu dropdown-bpr">
                        <li><a class="dropdown-item" href="#">Kantor</a></li>
                    </ul>
                </li>

                <!-- ================= PUBLIKASI ================= -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button">
                        Publikasi
                    </a>

                    <ul class="dropdown-menu dropdown-bpr">
                        <li><a class="dropdown-item" href="#">Berita</a></li>
                        <li><a class="dropdown-item" href="#">Pengumuman & Lelang</a></li>
                        <li><a class="dropdown-item" href="#">Event</a></li>
                        <li><a class="dropdown-item" href="#">Edukasi</a></li>
                        <li><a class="dropdown-item" href="#">Galeri</a></li>

                        <li class="dropdown-submenu">
                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                Laporan
                                <span class="arrow">›</span>
                            </a>
                            <ul class="dropdown-menu dropdown-bpr">
                                <li><a class="dropdown-item" href="#">Laporan Keuangan</a></li>
                                <li><a class="dropdown-item" href="#">Laporan Tata Kelola</a></li>
                                <li><a class="dropdown-item" href="#">Laporan Berkelanjutan</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- ================= PENGADUAN ================= -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button">
                        Pengaduan
                    </a>
                    <ul class="dropdown-menu dropdown-bpr">
                        <li><a class="dropdown-item" href="#">Penanganan Pengaduan</a></li>
                    </ul>
                </li>
