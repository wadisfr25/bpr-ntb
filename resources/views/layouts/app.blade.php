<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'BPR NTB')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">>
    <link rel="stylesheet" href="{{ asset('css/simulasi.css') }}">

    <style>
        /* ================= GLOBAL ================= */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', system-ui, sans-serif;
            font-size: 14px;
            color: #1f2937;
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        :root {
            --header-height: 96px;
        }

        .bg-bpr-blue {
            background-color: #00326B;
        }

        /* HEADER FIXED */
        .header-fixed {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 2000;
            background-color: #ffffff;
        }

        .header-spacer {
            height: var(--header-height);
        }

        /* ================= NAVBAR ================= */
        .navbar {
            position: relative;
            z-index: 9999;
            background: #fff;
            padding: 0;
            min-height: 64px;
        }

        /* item menu */
        .navbar-nav .nav-link {
            padding: 20px 14px;
            line-height: 1;
            white-space: nowrap;
        }

        /* logo */
        .navbar-brand img {
            height: 62px;
            width: auto;
        }

        @media (max-width: 768px) {
            .navbar-brand img {
                height: 34px;
            }

            .navbar-nav .nav-link {
                padding: 12px 16px;
            }
        }

        /* ================= DROPDOWN UMUM ================= */

        /* penting: dropdown tidak terpotong */
        .navbar,
        .navbar-collapse {
            overflow: visible !important;
        }

        /* dropdown level 1 */
        .navbar .dropdown-menu {
            position: absolute;
            top: 100%;
            left: auto;
            right: 0;
            /* KUNCI KE DALAM NAVBAR */
            z-index: 10000;
            margin-top: 0;
            min-width: 220px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
            border-radius: 6px;
        }

        /* ================= HOVER DESKTOP ================= */
        @media (min-width: 992px) {
            .navbar .nav-item.dropdown:hover>.dropdown-menu {
                display: block;
            }
        }

        /* ===== SUBMENU LEVEL 2 (AMAN VIEWPORT) ===== */
        .dropdown-submenu {
            position: relative;
        }

        /* default: buka ke kanan */
        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            right: auto;
            margin-left: 4px;
            display: none;
        }

        /* hover desktop */
        @media (min-width: 992px) {
            .dropdown-submenu:hover>.dropdown-menu {
                display: block;
            }
        }

        /* ===== JIKA DEKAT KANAN LAYAR → BUKA KE KIRI ===== */
        .navbar-nav>.dropdown:last-child .dropdown-submenu>.dropdown-menu,
        .navbar-nav>.dropdown:nth-last-child(2) .dropdown-submenu>.dropdown-menu {
            left: auto;
            right: 100%;
            margin-left: 0;
            margin-right: 4px;
        }

        /* ================= ANTI KELUAR LAYAR (KANAN) ================= */
        /* kalau dropdown mentok kanan */
        .navbar .dropdown-menu-end {
            right: 0;
            left: auto;
        }

        .navbar .dropdown-menu-end .dropdown-submenu>.dropdown-menu {
            right: 100%;
            left: auto;
        }


        /* TOPBAR */
        .topbar {
            background-color: #00326B;
        }

        /* ================= HERO FULL BLEED ================= */
        .hero-slider {
            width: 100vw;
            height: 65vh;
            margin-left: calc(50% - 50vw);
            margin-right: calc(50% - 50vw);
            margin-top: var(--header-height);
            padding: 0 !important;
            overflow: hidden;
            position: relative;
        }

        .hero-slider::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: #F5F7FA;
            z-index: 0;
        }

        .hero-carousel {
            position: relative;
            z-index: 1;
        }

        .hero-carousel,
        .hero-carousel .carousel-inner,
        .hero-carousel .carousel-item {
            height: 100%;
        }

        .hero-slide {
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center right;
        }

        /* ================= PROMO SECTION ================= */
        .promo-section {
            background-color: #ffffff;
            padding: 64px 0;
        }

        /* CARD */
        .promo-card {
            background-color: #F5F7FA;
            border-radius: 20px;
            padding: 48px 56px;
            display: flex;
            align-items: center;
            gap: 48px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        /* ================= KIRI: TEKS ================= */
        .promo-content {
            flex: 0 0 38%;
            /* ⬅️ FIX PROPORSI */
        }

        .promo-content h2 {
            font-size: 26px;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 14px;
        }

        .promo-content p {
            font-size: 14px;
            line-height: 1.7;
            color: #4b5563;
            margin-bottom: 22px;
        }

        /* ================= KANAN: GAMBAR ================= */
        .promo-slider-wrapper {
            flex: 0 0 62%;
            /* ⬅️ FIX PROPORSI */
            display: flex;
            justify-content: center;
        }

        .promo-image-slider {
            width: 100%;
            max-width: 520px;
            /* ⬅️ batas aman */
        }

        /* GAMBAR */
        .promo-image-slider img {
            width: 100%;
            height: 260px;
            /* ⬅️ KUNCI PROPORSI */
            object-fit: contain;
            /* WAJIB */
            border-radius: 18px;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 992px) {
            .promo-card {
                flex-direction: column;
                padding: 40px 32px;
                text-align: center;
            }

            .promo-content,
            .promo-slider-wrapper {
                flex: unset;
                width: 100%;
            }

            .promo-image-slider img {
                height: 220px;
            }
        }

        /* ================= SUKU BUNGA ================= */
        .suku-bunga-section {
            padding: 64px 0;
            background-color: #ffffff;
        }

        .suku-bunga-title {
            text-align: center;
            margin-bottom: 32px;
        }

        .suku-bunga-title h2 {
            font-size: 28px;
            font-weight: 800;
            color: #00326B;
            margin: 0;
        }

        .suku-bunga-title::after {
            content: "";
            display: block;
            width: 80px;
            height: 4px;
            background-color: #1E6FE8;
            border-radius: 99px;
            margin: 12px auto 0;
        }

        .suku-bunga-card {
            background-color: #F7F9FC;
            border-radius: 20px;
            padding: 36px;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.06);
        }

        .suku-bunga-body {
            display: grid;
            grid-template-columns: 1fr 1.6fr;
            gap: 40px;
        }

        /* KIRI */
        .sb-badge {
            display: inline-block;
            background-color: #1E6FE8;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 999px;
            margin-bottom: 16px;
        }

        .sb-value {
            font-size: 42px;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 16px;
        }

        .sb-note p {
            font-size: 13px;
            line-height: 1.7;
            color: #374151;
            margin-bottom: 8px;
        }

        .sb-note a {
            font-size: 13px;
            font-weight: 600;
            color: #1E6FE8;
            text-decoration: none;
        }

        .sb-note a:hover {
            text-decoration: underline;
        }

        /* ===== TABLE ===== */
        .sb-table {
            background-color: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        }

        .sb-table-header {
            background-color: #1E6FE8;
            color: #ffffff;
            display: flex;
            justify-content: space-between;
            padding: 12px 20px;
            font-weight: 700;
            font-size: 14px;
        }

        .sb-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 20px;
            font-size: 14px;
            border-top: 1px solid #e5e7eb;
            transition: background 0.2s ease;
        }

        .sb-row:hover {
            background-color: #F0F6FF;
        }


        /* RESPONSIVE */
        @media (max-width: 992px) {
            .suku-bunga-body {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .sb-value {
                font-size: 36px;
            }

            .suku-bunga-title h2 {
                font-size: 24px;
            }
        }

        /* ===== HOVER HEADER KIRI ===== */
        .suku-bunga-left .sb-header {
            transition: background-color 0.3s ease;
        }

        .suku-bunga-card:hover .sb-header {
            background-color: #00326B;
        }

        /* ===== HOVER NILAI LPS ===== */
        .suku-bunga-left .sb-value {
            transition: color 0.3s ease;
        }

        .suku-bunga-card:hover .sb-value {
            color: #00326B;
        }

        /* ===== TABLE HEADER HOVER ===== */
        .sb-table-header {
            transition: background-color 0.3s ease;
        }

        .sb-table:hover .sb-table-header {
            background-color: #00326B;
        }

        /* ===== ROW HOVER ===== */
        .sb-row {
            transition: background-color 0.25s ease, padding-left 0.25s ease;
        }

        .sb-row:hover {
            background-color: #F0F6FF;
            padding-left: 26px;
        }

        /* ===== PERSENTASE HOVER ===== */
        .sb-row span:last-child {
            font-weight: 600;
            transition: color 0.25s ease;
        }

        .sb-row:hover span:last-child {
            color: #1E6FE8;
        }

        /* ===== LINK HOVER ===== */
        .sb-note a {
            transition: color 0.25s ease;
        }

        .sb-note a:hover {
            color: #00326B;
            text-decoration: underline;
        }


        /* ================= BERITA GRID ================= */
        .berita-grid-section {
            padding: 64px 0;
            background-color: #ffffff;
        }

        .berita-grid-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .berita-grid-title {
            font-size: 26px;
            font-weight: 800;
            color: #00326B;
            margin: 0;
        }

        .berita-grid-btn {
            background-color: #E99D12;
            color: #00326B;
            font-size: 14px;
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 8px;
            text-decoration: none;
        }

        .berita-grid-btn:hover {
            background-color: #c27e00;
            color: #00326B;
        }

        .berita-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
        }

        .berita-card {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .berita-card img {
            width: 100%;
            height: 340px;
            object-fit: cover;
            display: block;
        }

        .berita-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.2), transparent);
            display: flex;
            align-items: flex-end;
            padding: 18px;
        }

        .berita-overlay-content h4 {
            font-size: 15px;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.4;
            margin-bottom: 6px;
        }

        .berita-overlay-content p {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.85);
            margin: 0;
        }

        /* ================= PRESTASI & PENGHARGAAN ================= */
        .prestasi-section {
            background-color: #ffffff;
            padding: 32px 0;
        }

        .prestasi-card {
            background-color: #F5F7FA;
            border-radius: 20px;
            padding: 48px;
            display: flex;
            align-items: center;
            gap: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .prestasi-image img {
            width: 360px;
            max-width: 100%;
            border-radius: 14px;
        }

        .prestasi-content {
            flex: 1;
        }

        .prestasi-content h2 {
            font-size: 26px;
            font-weight: 800;
            color: #00326B;
            margin-bottom: 12px;
        }

        .prestasi-content h4 {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 12px;
        }

        .prestasi-content p {
            font-size: 14px;
            line-height: 1.7;
            color: #4b5563;
            max-width: 520px;
            margin-bottom: 16px;
        }

        .prestasi-link {
            font-size: 14px;
            font-weight: 600;
            color: #00326B;
            text-decoration: none;
        }

        /* ================= LELANG PENGADAAN ================= */
        .lelang-section {
            background-color: #ffffff;
            padding: 32px 0;
        }

        .lelang-card {
            background-color: #F5F7FA;
            border-radius: 20px;
            padding: 48px;
            display: flex;
            align-items: center;
            gap: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .lelang-content {
            flex: 1;
        }

        .lelang-content h2 {
            font-size: 26px;
            font-weight: 800;
            color: #00326B;
            margin-bottom: 12px;
        }

        .lelang-content h4 {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 12px;
        }

        .lelang-content p {
            font-size: 14px;
            line-height: 1.7;
            color: #4b5563;
            max-width: 520px;
            margin-bottom: 16px;
        }

        .lelang-link {
            font-size: 14px;
            font-weight: 600;
            color: #00326B;
            text-decoration: none;
        }

        .lelang-image img {
            width: 360px;
            max-width: 100%;
            border-radius: 14px;
        }

        /* ================= TOPBAR RUNNING TEXT ================= */
        .topbar-wrapper {
            display: flex;
            align-items: center;
            gap: 16px;
            white-space: nowrap;
            overflow: hidden;
        }

        .topbar-separator {
            opacity: 0.6;
            flex-shrink: 0;
        }

        .marquee {
            flex: 1;
            min-width: 0;
            overflow: hidden;
            position: relative;
        }

        .marquee-content {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding-left: 100%;
            animation: marquee 18s linear infinite;
        }

        @keyframes marquee {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-100%);
            }
        }

        .marquee:hover .marquee-content {
            animation-play-state: paused;
        }

        .bg-bpr-blue i {
            font-size: 13px;
            color: #E99D12;
        }

        /* ================= FOOTER ================= */
        .site-footer {
            background-color: #06386B;
            color: #ffffff;
            font-size: 14px;
            padding: 48px 0 24px;
        }

        .footer-top {
            display: grid;
            grid-template-columns: 1.4fr 1fr 1.2fr;
            gap: 40px;
            align-items: flex-start;
            margin-bottom: 32px;
        }

        .footer-map img {
            width: 100%;
            max-width: 420px;
            border-radius: 12px;
        }

        .footer-column h4 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-column ul li {
            margin-bottom: 8px;
        }

        .footer-column ul li a {
            color: #ffffff;
            text-decoration: none;
            opacity: 0.9;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 32px;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.25);
        }

        .footer-legal p {
            max-width: 620px;
            font-size: 13px;
            line-height: 1.6;
            opacity: 0.9;
        }

        .counter-box {
            background: linear-gradient(to top, #00326B 0%, #0062D1 100%);
            border: 3px solid #E99D12;
            border-radius: 14px;
            padding: 12px 26px;
            text-align: center;
            color: #ffffff;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .counter-box strong {
            display: block;
            font-size: 24px;
            font-weight: 800;
        }

        /* ================= KONTAK & TESTIMONI ================= */
        .kontak-section {
            padding: 64px 0;
            background-color: #ffffff;
        }

        .kontak-card {
            display: flex;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.08);
        }

        .testimoni-box {
            flex: 1;
            background-color: #F5F7FA;
            padding: 48px;
            position: relative;
        }

        .hubungi-box {
            flex: 1;
            padding: 48px;
            position: relative;
            color: #ffffff;
            background-image: url('/images/hubungi-bg.png');
            background-size: cover;
            background-position: center;
        }

        .hubungi-box::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        .hubungi-box>* {
            position: relative;
            z-index: 2;
        }

        .hubungi-box input,
        .hubungi-box textarea {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: none;
            background-color: rgba(255, 255, 255, 0.9);
            margin-bottom: 14px;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 992px) {

            .promo-card,
            .prestasi-card,
            .lelang-card,
            .kontak-card {
                flex-direction: column;
                text-align: center;
            }

            .footer-top {
                grid-template-columns: 1fr;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .footer-counter {
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>

    <header class="header-fixed">
        @include('partials.topbar')
        @include('partials.navbar')
    </header>

    <!-- <div class="header-spacer"></div> -->

    {{-- HERO --}}
    @yield('hero')

    {{-- CONTENT --}}
    <main class="site-main">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
