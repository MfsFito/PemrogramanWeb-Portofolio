function tampilkanSapaan() {
    const elGreeting = document.getElementById('greeting');
    if (!elGreeting) return; // elemen tidak ada di halaman ini

    const now = new Date();
    const jam  = now.getHours();

    let sapaan;
    if (jam >= 5 && jam < 12) {
        sapaan = '☀️ Selamat Pagi!';
    } else if (jam >= 12 && jam < 15) {
        sapaan = '🌤️ Selamat Siang!';
    } else if (jam >= 15 && jam < 19) {
        sapaan = '🌅 Selamat Sore!';
    } else {
        sapaan = '🌙 Selamat Malam!';
    }
    elGreeting.textContent = sapaan;
}
tampilkanSapaan();


const form = document.getElementById('contact-form');

if (form) {
    form.addEventListener('submit', function (e) {
        e.preventDefault()
        // hapus error lama dulu setiap kali submit
        document.querySelectorAll('.error-msg').forEach(el => el.remove());
        document.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));

        let valid = true;

        function tampilkanError(field, pesan) {
            field.classList.add('input-error');
            const msg = document.createElement('span');
            msg.className = 'error-msg';
            msg.textContent = pesan;
            field.insertAdjacentElement('afterend', msg);
            valid = false;
        }

        // nama
        const nama = document.getElementById('nama');
        if (!nama.value.trim()) {
            tampilkanError(nama, 'Nama tidak boleh kosong.');
        } else if (nama.value.trim().length < 3) {
            tampilkanError(nama, 'Nama minimal 3 karakter.');
        }

        // email
        const email = document.getElementById('email');
        const reEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.value.trim()) {
            tampilkanError(email, 'Email tidak boleh kosong.');
        } else if (!reEmail.test(email.value.trim())) {
            tampilkanError(email, 'Format email tidak valid.');
        }

        // topik
        const topik = document.getElementById('topik');
        if (!topik.value) {
            tampilkanError(topik, 'Pilih topik terlebih dahulu.');
        }

        // isi pesan
        const pesan = document.getElementById('pesan');
        if (!pesan.value.trim()) {
            tampilkanError(pesan, 'Pesan tidak boleh kosong.');
        } else if (pesan.value.trim().length < 10) {
            tampilkanError(pesan, 'Pesan minimal 10 karakter.');
        }

        if (valid) {
            form.submit();
        }
    });
}

document.querySelectorAll('article').forEach(card => {
    card.addEventListener('mouseenter', function () {
        this.style.borderColor = '#0059ff';
        this.style.boxShadow   = '0 4px 16px rgba(0, 45, 193, 0.15)';
        this.style.transition  = 'all 0.25s ease';
    });
    card.addEventListener('mouseleave', function () {
        this.style.borderColor = '#ddd';
        this.style.boxShadow   = 'none';
    });
});