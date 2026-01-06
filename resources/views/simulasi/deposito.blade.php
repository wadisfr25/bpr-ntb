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
                <input type="number" placeholder="Nominal Deposito">

                <div class="simulasi-row">
                    <select>
                        <option>Tenor</option>
                        <option>1 Bulan</option>
                        <option>3 Bulan</option>
                        <option>6 Bulan</option>
                        <option>12 Bulan</option>
                    </select>

                    <select>
                        <option>Suku Bunga</option>
                        <option>5%</option>
                        <option>5.5%</option>
                        <option>6%</option>
                    </select>
                </div>

                <input type="text" placeholder="Estimasi Bunga Deposito" readonly>

                <small class="simulasi-note">
                    *Simulasi ini bersifat estimasi dan tidak menyimpan data pribadi.
                </small>
            </div>

            <!-- KANAN -->
            <div class="simulasi-right">
                <textarea placeholder="Estimasi Total Dana Diterima" readonly></textarea>

                <a href="{{ route('simulasi.permintaan', 'deposito') }}"
                   class="simulasi-btn">
                    Hubungi Saya
                </a>
            </div>

        </div>

    </div>
</section>

@endsection
