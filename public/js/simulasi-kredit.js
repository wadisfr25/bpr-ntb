document.addEventListener('DOMContentLoaded', function () {

    // ===== ELEMENT =====
    const pinjamanInput = document.getElementById('pinjaman');
    const jenisSelect   = document.getElementById('jenis_kredit');
    const tenorSelect   = document.getElementById('tenor');
    const sistemSelect  = document.getElementById('sistem_bunga');
    const bungaInfo     = document.getElementById('bunga-info');
    const hasil         = document.getElementById('angsuran');
    const errorText     = document.getElementById('pinjaman-error');
    const sistemWrapper = document.getElementById('sistem-bunga-wrapper');

    // ===== HELPER =====
    function rupiah(n) {
        return 'Rp ' + Math.round(n).toLocaleString('id-ID');
    }

    function angka(v) {
        return parseInt(v.replace(/[^0-9]/g, '')) || 0;
    }

    // ===== MINIMAL PINJAMAN =====
    function minimalPinjaman(jenis) {
        if (jenis === 'tanpa_agunan') return 1500000;
        if (jenis === 'agunan') return 5000000;
        if (jenis === 'konsumtif') return 5000000;
        return 0;
    }

    // ===== VALIDASI LANGSUNG =====
    function validasiLangsung() {
        const P = angka(pinjamanInput.value);
        const jenis = jenisSelect.value;

        if (!P || !jenis) {
            pinjamanInput.classList.remove('input-error');
            errorText.classList.add('d-none');
            return false;
        }

        const min = minimalPinjaman(jenis);

        if (P < min) {
            pinjamanInput.classList.add('input-error');
            errorText.classList.remove('d-none');
            errorText.textContent =
                `Minimal pinjaman untuk jenis ini adalah ${rupiah(min)}`;
            hasil.value = '';
            return false;
        }

        pinjamanInput.classList.remove('input-error');
        errorText.classList.add('d-none');
        return true;
    }

    function filterTenor() {
        const jenis  = jenisSelect.value;
        const sistem = sistemSelect.value;
        const P      = angka(pinjamanInput.value);

        const options = tenorSelect.querySelectorAll('option');

        // reset semua
        options.forEach(opt => {
            opt.hidden = false;
            opt.disabled = false;
        });

        // ==========================
        // KREDIT KONSUMTIF - FLAT
        // ==========================
        if (jenis === 'konsumtif' && sistem === 'flat') {

            function allowTenor(list) {
                options.forEach(opt => {
                    const t = parseInt(opt.value);
                    if (!t) return;
                    if (!list.includes(t)) {
                        opt.hidden = true;
                        opt.disabled = true;
                    }
                });
            }

            if (P >= 5000000 && P <= 25000000) {
                allowTenor([12, 24, 36, 48, 60]);
            }
            else if (P >= 30000000 && P <= 100000000) {
                allowTenor([12, 24, 36, 48, 60, 96, 120]);
            }
            else if (P >= 125000000) {
                allowTenor([12, 24, 36, 48, 60, 96, 120, 144]);
            }
            return;
        }

        // ==========================
        // KREDIT KONSUMTIF - ANUITAS
        // ==========================
        if (jenis === 'konsumtif' && sistem === 'anuitas') {

            options.forEach(opt => {
                const t = parseInt(opt.value);
                if (!t) return;

                // ❌ Default: sembunyikan tenor panjang
                if (t === 132 || t === 144) {
                    opt.hidden = true;
                    opt.disabled = true;
                }

                // ✅ KECUALI: nominal ≥ 125 jt
                if (P >= 125000000 && (t === 132 || t === 144)) {
                    opt.hidden = false;
                    opt.disabled = false;
                }
            });
        }
    }

    function rateAnuitas(pinjaman, tenor) {

        if (pinjaman >= 125000000) {
            if (tenor === 132) return 130.3;
            if (tenor === 144) return 144.7;
        }

        if (pinjaman >= 30000000) {
            if (tenor === 72) return 64.2;
            if (tenor === 84) return 76.5;
            if (tenor === 96) return 89.3;
            if (tenor === 108) return 102.6;
            if (tenor === 120) return 116.2;
        }

        if (pinjaman >= 5000000) {
            if (tenor === 12) return 10;
            if (tenor === 24) return 19.8;
            if (tenor === 36) return 30.1;
            if (tenor === 48) return 41;
            if (tenor === 60) return 52.4;
        }

        return null; // tidak valid
    }

    // ===== HITUNG ANGSURAN =====
    function hitungAngsuran() {
        const P = angka(pinjamanInput.value);
        const n = parseInt(tenorSelect.value);
        const jenis = jenisSelect.value;
        const sistem = sistemSelect.value;

        if (!validasiLangsung()) return;
        if (!P || !n || !jenis) {
            hasil.value = '';
            bungaInfo.textContent = 'Suku Bunga (%)';
            return;
        }

        let angsuran = 0;

        // ===============================
        // TANPA AGUNAN → FLAT 15%
        // ===============================
        if (jenis === 'tanpa_agunan') {
            const bungaTahunan = 15;
            const i = bungaTahunan / 100 / 12;

            bungaInfo.textContent = 'Suku Bunga: 15% / tahun';
            angsuran = (P / n) + (P * i);
        }

        // ===============================
        // KREDIT KONSUMTIF / AGUNAN
        // ===============================
        if (jenis !== 'tanpa_agunan') {

            if (!sistem) {
                hasil.value = '';
                bungaInfo.textContent = 'Suku Bunga (%)';
                return;
            }

            // ===== FLAT KONSUMTIF =====
            if (sistem === 'flat') {

                let bungaTahunan = 0;

                if (P >= 5000000 && P <= 25000000) bungaTahunan = 15;
                else if (P >= 30000000 && P <= 100000000) bungaTahunan = 13;
                else if (P >= 125000000) bungaTahunan = 12;

                const i = bungaTahunan / 100 / 12;

                bungaInfo.textContent = `Suku Bunga: ${bungaTahunan}% / tahun`;
                angsuran = (P / n) + (P * i);
            }

            // ===== ANUITAS (VERSI BROSUR) =====
            if (sistem === 'anuitas') {

                const totalPersen = rateAnuitas(P, n);


                if (!totalPersen) {
                    hasil.value = '';
                    bungaInfo.textContent = 'Tenor / nominal tidak memenuhi syarat anuitas';
                    return;
                }

                const totalBunga = P * (totalPersen / 100);
                const bungaPerBulan = totalBunga / n;
                const pokokPerBulan = P / n;

                bungaInfo.textContent = `Suku Bunga: ${totalPersen}% (total)`;
                angsuran = pokokPerBulan + bungaPerBulan;
            }
        }

        hasil.value = rupiah(angsuran);
    }


    // ===== EVENT =====
    pinjamanInput.addEventListener('input', function () {
        const val = angka(this.value);
        this.value = val ? rupiah(val) : '';
        validasiLangsung();
        filterTenor();
        hitungAngsuran();
    });

    jenisSelect.addEventListener('change', function () {

        if (this.value === 'tanpa_agunan') {
            sistemSelect.value = 'flat';
            sistemWrapper.classList.add('d-none');
        } else {
            sistemSelect.value = '';
            sistemWrapper.classList.remove('d-none');
        }

        filterTenor();
        validasiLangsung();
        hitungAngsuran();
    });

    sistemSelect.addEventListener('change', function () {
        filterTenor();      // hanya berdampak ke FLAT
        hitungAngsuran();   // ANUITAS AMAN
    });

    tenorSelect.addEventListener('change', function () {
        hitungAngsuran();   // 🔥 INI YANG MEMASTIKAN ANUITAS JALAN
    });

});
