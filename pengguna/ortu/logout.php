<?php
session_start();

// Hapus sesi id_ortu jika ada
if (isset($_SESSION['id_ortu'])) {
    unset($_SESSION['id_ortu']);
}

// Redirect pengguna kembali ke halaman login
header("Location: ../../berlangganan/login_pegunah");
exit;
