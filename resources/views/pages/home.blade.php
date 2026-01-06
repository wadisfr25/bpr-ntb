@extends('layouts.app')

@section('title', 'Beranda - BPR NTB')

@section('content')

    {{-- ================= HERO SLIDER ================= --}}
    <section class="hero-slider">
        <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-inner">

                @for ($i = 0; $i < 3; $i++)
                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                        <div class="hero-slide" style="background-image: url('{{ asset('images/simbada.png') }}')">
                        </div>
                    </div>
                @endfor

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    {{-- ================= PROMO ================= --}}
    <section class="promo-section">
        <div class="container">

            <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000"
                data-bs-pause="false">

                <div class="carousel-inner">

                    <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000"
                        data-bs-pause="hover" data-bs-touch="true">

                        <div class="carousel-inner">

                            <!-- SLIDE 1 -->
                            <div class="carousel-item active">
                                <div class="promo-card">

                                    <div class="promo-content">
                                        <h2>SIMBADA 2025</h2>
                                        <h4>Wujudkan Impian Ibadah Anda bersama kami</h4>
                                        <p>
                                            Dengan membuka rekening SIMBADA (Simpanan Berjangka),
                                            Anda dapat menabung secara rutin dan terencana.
                                        </p>
                                    </div>

                                    <div class="promo-image">
                                        <img src="{{ asset('images/simbada-card.png') }}">
                                    </div>

                                </div>
                            </div>

                            <!-- SLIDE 2 -->
                            <div class="carousel-item">
                                <div class="promo-card">

                                    <div class="promo-content">
                                        <h2>SIMBADA UMROH</h2>
                                        <h4>Tabungan Ibadah Lebih Terencana</h4>
                                        <p>
                                            Setoran ringan dan fleksibel untuk persiapan umroh Anda.
                                        </p>
                                    </div>

                                    <div class="promo-image">
                                        <img src="{{ asset('images/simbada-card.png') }}">
                                    </div>

                                </div>
                            </div>

                        </div>

                        <!-- PANAH (OPSIONAL TAPI DISARANKAN) -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>

                    </div>

                    {{-- ================= SUKU BUNGA ================= --}}
                    <section class="suku-bunga-section">
                        <div class="container">

                            <div class="suku-bunga-card">

                                <!-- JUDUL -->
                                <div class="suku-bunga-title">
                                    <h2>Suku Bunga</h2>
                                </div>

                                <div class="suku-bunga-body">

                                    <!-- KIRI -->
                                    <div class="suku-bunga-left">
                                        <span class="sb-badge">LPS BPR</span>
                                        <div class="sb-value">6.00%</div>

                                        <div class="sb-note">
                                            <p>
                                                <strong>Keterangan:</strong><br>
                                                • LPS BPR periode <strong>01 Oktober 2025</strong> s/d <strong>31 Desember
                                                    2025</strong><br>
                                                • Suku bunga sewaktu-waktu dapat berubah<br>
                                                • Simpanan dijamin LPS hingga <strong>Rp 2 Miliar</strong> per nasabah per
                                                bank
                                            </p>
                                            <a href="https://apps.lps.go.id/BankPesertaLPSRate">Cek tingkat bunga penjaminan
                                                LPS →</a>
                                        </div>
                                    </div>

                                    <!-- KANAN -->
                                    <div class="suku-bunga-right">

                                        <!-- TABUNGAN -->
                                        <div class="sb-table">
                                            <div class="sb-table-header">
                                                <span>Tabungan</span>
                                                <span>% / tahun</span>
                                            </div>

                                            <div class="sb-row">
                                                <span>TabunganKU</span>
                                                <span>3%</span>
                                            </div>
                                            <div class="sb-row">
                                                <span>Simbada</span>
                                                <span>5%</span>
                                            </div>
                                            <div class="sb-row">
                                                <span>Tabungan Sukses</span>
                                                <span>4%</span>
                                            </div>
                                            <div class="sb-row">
                                                <span>Tabungan Siswa</span>
                                                <span>Max 4%</span>
                                            </div>
                                            <div class="sb-row">
                                                <span>Tabungan Simpel</span>
                                                <span>Max 2%</span>
                                            </div>
                                        </div>

                                        <!-- DEPOSITO -->
                                        <div class="sb-table mt-4">
                                            <div class="sb-table-header">
                                                <span>Deposito</span>
                                                <span>%</span>
                                            </div>

                                            <div class="sb-row">
                                                <span>1 Bulan</span>
                                                <span>5.00% p.a.</span>
                                            </div>
                                            <div class="sb-row">
                                                <span>3 Bulan</span>
                                                <span>5.25% p.a.</span>
                                            </div>
                                            <div class="sb-row">
                                                <span>6 Bulan</span>
                                                <span>5.50% p.a.</span>
                                            </div>
                                            <div class="sb-row">
                                                <span>12 Bulan</span>
                                                <span>6.00% p.a.</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </section>


                    {{-- ================= BERITA TERKINI ================= --}}
                    <section class="berita-grid-section">
                        <div class="container">

                            <!-- HEADER -->
                            <div class="berita-grid-header">
                                <h2 class="berita-grid-title">BERITA TERKINI</h2>
                                <a href="#" class="berita-grid-btn">Berita Lainnya</a>
                            </div>

                            <!-- GRID -->
                            <div class="berita-grid">

                                @for ($i = 0; $i < 4; $i++)
                                    <div class="berita-card">

                                        <img src="{{ asset('images/berita.png') }}" alt="Berita">

                                        <div class="berita-overlay">
                                            <div class="berita-overlay-content">
                                                <h4>
                                                    PT. BPR NTB (Perseroda)
                                                    melakukan Pelatihan
                                                </h4>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                @endfor

                            </div>

                        </div>
                    </section>


                    {{-- ================= PRESTASI & PENGHARGAAN ================= --}}
                    <section class="prestasi-section">
                        <div class="container">

                            <div class="prestasi-card">

                                <!-- KIRI : GAMBAR -->
                                <div class="prestasi-image">
                                    <img src="{{ asset('images/penghargaan-infobank.png') }}" alt="Penghargaan Infobank">
                                </div>

                                <!-- KANAN : KONTEN -->
                                <div class="prestasi-content">
                                    <h2>PRESTASI & PENGHARGAAN</h2>

                                    <h4>
                                        Penghargaan Infobank Award
                                        <strong>“Sangat Bagus”</strong>
                                    </h4>

                                    <p>
                                        PT BPR NTB (Perseroda) meraih penghargaan Infobank Award
                                        dengan predikat “Sangat Bagus” atas kinerja keuangan
                                        yang sehat dan tata kelola perusahaan yang profesional.
                                    </p>

                                    <a href="#" class="prestasi-link">
                                        Selengkapnya →
                                    </a>
                                </div>

                            </div>

                        </div>
                    </section>


                    {{-- ================= LELANG PENGADAAN ================= --}}
                    <section class="lelang-section">
                        <div class="container">

                            <div class="lelang-card">

                                <!-- KIRI : KONTEN -->
                                <div class="lelang-content">
                                    <h2>LELANG PENGADAAN</h2>

                                    <h4>
                                        Pengumuman Pemenang Seleksi
                                        Penyedia Jasa Audit
                                    </h4>

                                    <p>
                                        PT BPR NTB (Perseroda) telah melaksanakan proses seleksi
                                        penyedia jasa audit laporan keuangan secara terbuka,
                                        transparan, dan akuntabel sesuai dengan ketentuan
                                        yang berlaku.
                                    </p>

                                    <a href="#" class="lelang-link">
                                        Baca Selengkapnya →
                                    </a>
                                </div>

                                <!-- KANAN : GAMBAR -->
                                <div class="lelang-image">
                                    <img src="{{ asset('images/lelang-pengadaan.png') }}" alt="Lelang Pengadaan">
                                </div>

                            </div>

                        </div>
                    </section>


                    {{-- ================= TESTIMONI & HUBUNGI KAMI ================= --}}
                    <section class="kontak-section">
                        <div class="container">

                            <div class="kontak-card">

                                <!-- KIRI: TESTIMONI -->
                                <div class="testimoni-box">
                                    <h3>Testimoni Nasabah</h3>

                                    <p class="testimoni-text">
                                        “Saya sudah menjadi nasabah PD. BPR NTB Mataram selama beberapa
                                        tahun dan merasa sangat terbantu dengan pelayanan yang cepat,
                                        ramah, dan transparan. Proses menabung maupun pengajuan kredit
                                        jelas dan mudah dipahami. Petugasnya juga selalu responsif dan
                                        memberikan solusi yang sesuai dengan kebutuhan saya.”
                                    </p>

                                    <p class="testimoni-nama">
                                        — Ahmad Fauzi, Nasabah PD. BPR NTB Mataram
                                    </p>
                                </div>

                                <!-- KANAN: HUBUNGI KAMI -->
                                <div class="hubungi-box">
                                    <h3>Hubungi Kami</h3>

                                    <form>
                                        <div class="form-row">
                                            <input type="text" placeholder="Nama">
                                            <input type="email" placeholder="Email">
                                        </div>

                                        <input type="text" placeholder="Subject">

                                        <textarea rows="4" placeholder="Pesan"></textarea>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </section>
