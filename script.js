document.getElementById('registerForm').addEventListener('submit', function (event) {
    // Ambil nilai input
    var name = document.getElementById('name').value.trim();
    var employeeId = document.getElementById('employeeId').value.trim();
    var email = document.getElementById('email').value.trim();
    var gender = document.getElementById('gender').value.trim();
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var position = document.getElementById('position').value.trim();

    // Validasi form
    if (name.length < 3 || name.length > 30) {
        alert('Nama lengkap minimal terdiri dari 3 huruf, maksimal 30');
        event.preventDefault(); // Mencegah form dikirim
        return;
    }

    if (!/^ID\d{4}$/.test(employeeId)) {
        alert('ID Karyawan harus diawali dengan "ID"(huruf kapital) diikuti 4 angka');
        event.preventDefault(); // Mencegah form dikirim
        return;
    }

    if (!/^\S+@\S+\.\S+$/.test(email)) {
        alert('Email tidak valid, gunakan email valid anda');
        event.preventDefault(); // Mencegah form dikirim
        return;
    }

    if (gender === "") {
        alert('Jenis kelamin harus dipilih');
        event.preventDefault(); // Mencegah form dikirim
        return;
    }

    if (password.length < 6 || password.length > 15) {
        alert('Password harus terdiri dari minimal 6 karakter, maksimal 15');
        event.preventDefault(); // Mencegah form dikirim
        return;
    }

    if (password !== confirmPassword) {
        alert('konfirmasi password tidak cocok, ulangi inputan');
        event.preventDefault(); // Mencegah form dikirim
        return;
    }

    if (position.length < 3) {
        alert('Jabatan harus diisi dengan benar');
        event.preventDefault(); // Mencegah form dikirim
        return;
    }

    // Setelah validasi berhasil, biarkan form dikirim
    alert('Registrasi berhasil!');
});
