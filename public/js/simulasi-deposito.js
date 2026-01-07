document.addEventListener('DOMContentLoaded', function () {

    const bungaTenor = {
        1: 5,
        3: 5.25,
        6: 5.5,
        12: 6
    };

    const nominalInput = document.getElementById('nominal');
    const tenorSelect  = document.getElementById('tenor');
    const bungaSelect  = document.getElementById('bunga');
    const bungaOutput  = document.getElementById('estimasi_bunga');
    const totalOutput  = document.getElementById('total_dana');
    const errorText    = document.getElementById('nominal-error');

    // ===== FORMAT RUPIAH =====
    function formatRupiah(angka) {
        return 'Rp ' + angka.toLocaleString('id-ID');
    }

    function getAngka(nominal) {
        return parseInt(nominal.replace(/[^0-9]/g, '')) || 0;
    }

    function validasiNominal(nominal) {
        if (nominal < 5000000) {
            nominalInput.classList.add('input-error');
            errorText.classList.remove('d-none');
            bungaOutput.value = '';
            totalOutput.value = '';
            return false;
        }

        nominalInput.classList.remove('input-error');
        errorText.classList.add('d-none');
        return true;
    }

    function hitungDeposito() {
        const nominal = getAngka(nominalInput.value);
        const tenor   = tenorSelect.value;

        if (!nominal || !validasiNominal(nominal)) return;
        if (!tenor) return;

        const bungaTahunan = bungaTenor[tenor];
        const bunga = nominal * (bungaTahunan / 100) * (tenor / 12);
        const total = nominal + bunga;

        bungaOutput.value = formatRupiah(Math.floor(bunga));
        totalOutput.value = formatRupiah(Math.floor(total));
    }

    // ===== EVENT =====
    nominalInput.addEventListener('input', function () {
        let angka = getAngka(this.value);

        if (angka > 0) {
            this.value = formatRupiah(angka);
        } else {
            this.value = '';
        }

        hitungDeposito();
    });

    tenorSelect.addEventListener('change', function () {
        if (this.value) {
            bungaSelect.value = bungaTenor[this.value] + '%';
        } else {
            bungaSelect.value = '';
        }
        hitungDeposito();
    });

});
