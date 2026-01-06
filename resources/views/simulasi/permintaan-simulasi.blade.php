@extends('layouts.app')

@section('title', 'Permintaan Informasi Lanjutan')

@section('content')

<!-- BANNER POLOS TANPA TEKS -->
<div class="simulasi-banner-plain"></div>

<section class="simulasi-section">
    <div class="container-fluid px-5">

        <h2 class="simulasi-title">PERMINTAAN INFORMASI LANJUTAN</h2>

        <div class="simulasi-card">
            <form action="{{ route('simulasi.permintaan.submit') }}" method="POST">
                @csrf

                <input type="hidden" name="jenis" value="{{ $jenis }}">

                <div class="simulasi-field">
                    <input type="text" name="nama" placeholder="Nama Lengkap" required>
                </div>

                <div class="simulasi-field">
                    <input type="text" name="telepon" placeholder="Nomor Telepon" required>
                </div>

                <div class="simulasi-field">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <label class="simulasi-checkbox">
                    <input type="checkbox" required>
                    Saya bersedia dihubungi oleh petugas Bank untuk memperoleh informasi
                    dan penawaran produk sesuai dengan Kebijakan Privasi.
                </label>

                <div class="simulasi-action">
                    <button type="submit" class="simulasi-btn">
                        Kirim &raquo;
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>

@endsection
