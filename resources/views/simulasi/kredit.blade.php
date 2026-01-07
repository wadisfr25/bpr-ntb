@extends('layouts.app')

@section('title', 'Simulasi Kredit')

@section('content')

<section class="simulasi-banner">
    <div class="container-fluid px-5 simulasi-header">
        <h1 class="simulasi-heading">Simulasi Kredit</h1>
        <p class="simulasi-breadcrumb">
            <span class="breadcrumb-main">Produk & Layanan</span>
            <span class="breadcrumb-separator"> - </span>
            <span class="breadcrumb-sub">Simulasi Kredit</span>
        </p>
    </div>
</section>

<section class="simulasi-section">
    <div class="container-fluid px-5">
        <div class="simulasi-box">

            <!-- KIRI -->
            <div class="simulasi-left">

                <input type="text" id="pinjaman"
                       placeholder="Jumlah Pinjaman">
                <small id="pinjaman-error" class="text-danger d-none">
                    Minimal pinjaman belum sesuai jenis kredit
                </small>
                <select id="jenis_kredit">
                    <option value="">Jenis Kredit</option>
                    <option value="konsumtif">Kredit Konsumtif</option>
                    <option value="agunan">Modal Kerja - Dengan Agunan</option>
                    <option value="tanpa_agunan">Modal Kerja - Tanpa Agunan</option>
                </select>

                <div class="simulasi-row">
                    <select id="tenor">
                        <option value="">Tenor (Bulan)</option>
                        <option value="6">6</option>
                        <option value="12">12</option>
                        <option value="18">18</option>
                        <option value="24">24</option>
                        <option value="36">36</option>
                        <option value="48">48</option>
                        <option value="60">60</option>
                        <option value="72">72</option>
                        <option value="84">84</option>
                        <option value="96">96</option>
                        <option value="108">108</option>
                        <option value="120">120</option>
                        <option value="132">132</option>
                        <option value="144">144</option>
                    </select>
                </div>
                <!-- SISTEM BUNGA (BISA DISHOW / HIDE) -->
                <div id="sistem-bunga-wrapper">
                    <select id="sistem_bunga">
                        <option value="">Sistem Bunga</option>
                        <option value="flat">Flat</option>
                        <option value="anuitas">Anuitas</option>
                    </select>
                </div>

                <div id="bunga-info" class="simulasi-bunga">
                    Suku Bunga (%)
                </div>

                <small class="simulasi-note">
                    *Simulasi ini bersifat estimasi dan tidak mengikat.
                </small>
            </div>

            <!-- KANAN -->
            <div class="simulasi-right">
                <textarea id="angsuran"
                          placeholder="Estimasi Angsuran / Bulan"
                          readonly></textarea>
                <!-- CATATAN ANUITAS (BUKAN POPUP) -->
                <div id="anuitas-info" class="simulasi-warning d-none">
                    <strong>Catatan:</strong><br>
                    Hasil simulasi angsuran dengan sistem bunga <b>anuitas</b> bersifat estimasi.
                    Perbedaan angka dapat terjadi karena perhitungan bunga harian dan metode
                    pembulatan sistem perbankan.
                    <br><br>
                    Untuk informasi resmi dan detail, silakan hubungi petugas kami.
                </div>
                <a href="{{ route('simulasi.permintaan', 'kredit') }}"
                   class="simulasi-btn">
                    Hubungi Saya
                </a>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/simulasi-kredit.js') }}"></script>
@endpush
