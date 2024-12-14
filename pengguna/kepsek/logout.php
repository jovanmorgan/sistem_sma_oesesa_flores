<?php
session_start();

// Hapus sesi id_kepsek jika ada
if (isset($_SESSION['id_kepsek'])) {
    unset($_SESSION['id_kepsek']);
}

// Redirect pengguna kembali ke halaman login
header("Location: ../../berlangganan/login_pegunah");
exit;
