@extends('layouts.app')

@section('title', 'Simulasi Deposito')

@section('content')

<!-- HERO / HEADER -->
<section class="simulasi-banner">
    <div class="container-fluid px-5 simulasi-header">
        <h1 class="simulasi-heading">Simulasi Deposito</h1>

        <p class="simulasi-breadcrumb">
            <span class="breadcrumb-main">Produk & Layanan</span>
            <span class="breadcrumb-separator"> - </span>
            <span class="breadcrumb-sub">Simulasi Deposito</span>
        </p>
    </div>
</section>

<!-- FORM SIMULASI -->
<section class="simulasi-section">
    <div class="container-fluid px-5">

        <div class="simulasi-box">

            <!-- KIRI -->
            <div class="simulasi-left">

            <!-- Nominal -->
            <input type="text"
                id="nominal"
                min="5000000"
                placeholder="Nominal Deposito (Min. Rp 5.000.000)">

            <small id="nominal-error" class="text-danger d-none">
                Minimal nominal deposito adalah Rp 5.000.000
            </small>

                <!-- Tenor & Bunga -->
                <div class="simulasi-row">
                    <select id="tenor">
                        <option value="">Tenor</option>
                        <option value="1">1 Bulan</option>
                        <option value="3">3 Bulan</option>
                        <option value="6">6 Bulan</option>
                        <option value="12">12 Bulan</option>
                    </select>

                <input type="text"
                    id="bunga"
                    placeholder="Suku Bunga"
                    readonly>
                </div>

                <!-- Estimasi Bunga -->
                <input type="text"
                       id="estimasi_bunga"
                       placeholder="Estimasi Bunga Deposito"
                       readonly>

                <small class="simulasi-note">
                    *Simulasi ini bersifat estimasi dan tidak menyimpan data pribadi.
                </small>
            </div>

            <!-- KANAN -->
            <div class="simulasi-right">
                <textarea id="total_dana"
                          placeholder="Estimasi Total Dana Diterima"
                          readonly></textarea>

                <a href="{{ route('simulasi.permintaan', 'deposito') }}"
                   class="simulasi-btn">
                    Hubungi Saya
                </a>
            </div>

        </div>

    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/simulasi-deposito.js') }}"></script>
@endpush
