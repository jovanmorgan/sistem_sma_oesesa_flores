<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_kepsek = $_POST['id_kepsek'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

// Lakukan validasi data
if (empty($username) || empty($password) || empty($nama)) {
    echo "data_tidak_lengkap";
    exit();
}

// Cek apakah username sudah ada di database, kecuali untuk data guru yang sedang diedit
$check_query = "SELECT * FROM guru WHERE username = '$username'";
$result = mysqli_query($koneksi, $check_query);
if (mysqli_num_rows($result) > 0) {
    echo "error_username_exists"; // Kirim respon "error_username_exists" jika username sudah terdaftar
    exit();
}

// Cek apakah username sudah ada di tabel admin
$check_query_admin = "SELECT * FROM admin WHERE username = '$username'";
$result_admin = mysqli_query($koneksi, $check_query_admin);
if (mysqli_num_rows($result_admin) > 0) {
    echo "error_username_exists"; // Kirim respon "error_username_exists" jika username sudah terdaftar
    exit();
}

// Cek apakah username sudah ada di tabel kepsek
$check_query_kepsek = "SELECT * FROM kepsek WHERE username = '$username' AND id_kepsek != '$id_kepsek'";
$result_kepsek = mysqli_query($koneksi, $check_query_kepsek);
if (mysqli_num_rows($result_kepsek) > 0) {
    echo "error_username_exists"; // Kirim respon "error_username_exists" jika username sudah terdaftar
    exit();
}

// Cek apakah username sudah ada di tabel ortu
$check_query_ortu = "SELECT * FROM ortu WHERE username = '$username'";
$result_ortu = mysqli_query($koneksi, $check_query_ortu);
if (mysqli_num_rows($result_ortu) > 0) {
    echo "error_username_exists"; // Kirim respon "error_username_exists" jika username sudah terdaftar
    exit();
}

// Cek apakah username sudah ada di tabel siswa
$check_query_siswa = "SELECT * FROM siswa WHERE username = '$username'";
$result_siswa = mysqli_query($koneksi, $check_query_siswa);
if (mysqli_num_rows($result_siswa) > 0) {
    echo "error_username_exists"; // Kirim respon "error_username_exists" jika username sudah terdaftar
    exit();
}

if (strlen($password) < 8) {
    echo "error_password_length"; // Kirim respon "error_password_length" jika panjang password kurang dari 8 karakter
    exit();
}

// Tambahkan logika untuk memeriksa password
if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/", $password)) {
    echo "error_password_strength"; // Kirim respon "error_password_strength" jika password tidak memenuhi syarat
    exit();
}

// Buat query SQL untuk mengupdate data kepsek ke dalam database
$query = "UPDATE kepsek SET 
            nama = '$nama', 
            username = '$username', 
            password = '$password'
          WHERE id_kepsek = '$id_kepsek'";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
