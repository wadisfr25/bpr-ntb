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

        // helper
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

        // ==========================
        // KREDIT KONSUMTIF - FLAT
        // ==========================
        if (jenis === 'konsumtif' && sistem === 'flat') {

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

            if (P >= 5000000 && P <= 25000000) {
                allowTenor([12, 24, 36, 48, 60]);
            }
            else if (P >= 30000000 && P <= 100000000) {
                allowTenor([12, 24, 36, 48, 60, 72, 84, 96, 108, 120]);
            }
            else if (P >= 125000000) {
                allowTenor([12, 24, 36, 48, 60, 72, 84, 96, 108, 120, 132, 144]);
            }
        }
        // ==========================
        // MODAL KERJA - DENGAN AGUNAN (ANUITAS)
        // ==========================
        if (jenis === 'agunan' && sistem === 'anuitas') {

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

            if (P >= 300000000) {
                allowTenor([6, 12, 18, 24, 36, 48, 60, 72]);
            }
            else if (P >= 60000000) {
                allowTenor([6, 12, 18, 24, 36, 48, 60]);
            }
            else if (P >= 5000000) {
                allowTenor([6, 12, 18, 24, 36]);
            }

            return;
        }

        // ==========================
        // MODAL KERJA - DENGAN AGUNAN (FLAT)
        // ==========================
        if (jenis === 'agunan' && sistem === 'flat') {

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

            if (P >= 5000000 && P <= 50000000) {
                allowTenor([6, 12, 18, 24, 36]);
            }
            else if (P >= 60000000 && P <= 250000000) {
                allowTenor([6, 12, 18, 24, 36, 48, 60]);
            }
            else if (P >= 300000000) {
                allowTenor([6, 12, 18, 24, 36, 48, 60, 72]);
            }

            return;
        }
        // ==========================
        // MODAL KERJA - TANPA AGUNAN
        // ==========================
        if (jenis === 'tanpa_agunan') {
            allowTenor([6, 12, 18, 24]);
            return;
        }

    }

    function rateAnuitas(pinjaman, tenor, jenis) {

        // =========================
        // MODAL KERJA - AGUNAN
        // =========================
        if (jenis === 'agunan') {

            if (pinjaman >= 300000000) {
                if (tenor === 72) return 64.2;
            }

            if (pinjaman >= 60000000) {
                if (tenor === 48) return 41;
                if (tenor === 60) return 52.4;
            }

            if (pinjaman >= 5000000) {
                if (tenor === 6)  return 5.3;
                if (tenor === 12) return 10;
                if (tenor === 18) return 14.9;
                if (tenor === 24) return 19.8;
                if (tenor === 36) return 30.1;
            }

            return null;
        }

        // =========================
        // KREDIT KONSUMTIF 
        // =========================
        if (jenis === 'konsumtif') {

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
        }

        return null;
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
        // MODAL KERJA - TANPA AGUNAN
        // ===============================
        if (jenis === 'tanpa_agunan') {

            const bungaTahunan = 16;
            const bungaBulanan = bungaTahunan / 100 / 12; // 1.333%

            bungaInfo.textContent = 'Suku Bunga: 1,33% / bulan (16% / tahun)';

            const pokokPerBulan = P / n;
            const bungaPerBulan = P * bungaBulanan;

            // ikuti pola simulasi sebelumnya (bukan rumus anuitas murni)
            angsuran = Math.round(pokokPerBulan + bungaPerBulan);
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

                // =========================
                // AGUNAN
                // =========================
                if (jenis === 'agunan') {

                    if (P >= 5000000 && P <= 50000000) bungaTahunan = 15;
                    else if (P >= 60000000 && P <= 250000000) bungaTahunan = 13;
                    else if (P >= 300000000) bungaTahunan = 12;

                }
                // =========================
                // KONSUMTIF (SUDAH ADA)
                // =========================
                else if (jenis === 'konsumtif') {

                    if (P >= 5000000 && P <= 25000000) bungaTahunan = 15;
                    else if (P >= 30000000 && P <= 100000000) bungaTahunan = 13;
                    else if (P >= 125000000) bungaTahunan = 12;
                }

                const i = bungaTahunan / 100 / 12;
                const bungaBulananPersen = bungaTahunan / 12;

                bungaInfo.textContent =
                    `Suku Bunga: ${bungaBulananPersen.toFixed(3)}% / bulan`;

                angsuran = (P / n) + (P * i);
            }

            

            // ===== ANUITAS (VERSI BROSUR) =====
            if (sistem === 'anuitas') {

                const totalPersen = rateAnuitas(P, n, jenis);


                if (!totalPersen) {
                    hasil.value = '';
                    bungaInfo.textContent = 'Tenor / nominal tidak memenuhi syarat anuitas';
                    return;
                }

                const totalBunga = P * (totalPersen / 100);
                const bungaPerBulan = totalBunga / n;
                const pokokPerBulan = P / n;
                const bungaPerBulanPersen = totalPersen / n;

                bungaInfo.textContent =
                    `Suku Bunga: ${bungaPerBulanPersen.toFixed(3)}% / bulan`;
                angsuran = pokokPerBulan + bungaPerBulan;
            }
        }

        hasil.value = rupiah(angsuran);
    }


    // ===== EVENT =====
pinjamanInput.addEventListener('input', function (e) {
    const input = e.target;

    // simpan posisi cursor
    const start = input.selectionStart;
    const oldLength = input.value.length;

    // ambil angka murni
    const raw = angka(input.value);

    // format rupiah
    input.value = raw ? rupiah(raw) : '';

    // hitung selisih panjang
    const newLength = input.value.length;
    const diff = newLength - oldLength;

    // kembalikan cursor
    const newPos = start + diff;
    input.setSelectionRange(newPos, newPos);

    validasiLangsung();
    filterTenor();
    hitungAngsuran();
});

    jenisSelect.addEventListener('change', function () {
        anuitasInfo.classList.add('d-none');
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
    const anuitasInfo = document.getElementById('anuitas-info');

    sistemSelect.addEventListener('change', function () {
        filterTenor();      // hanya berdampak ke FLAT
        hitungAngsuran();   // ANUITAS AMAN
            if (this.value === 'anuitas') {
        anuitasInfo.classList.remove('d-none');
        } else {
            anuitasInfo.classList.add('d-none');
        }
    });

    tenorSelect.addEventListener('change', function () {
        hitungAngsuran();   // 🔥 INI YANG MEMASTIKAN ANUITAS JALAN
    });

});
