<?php
// Lakukan koneksi ke database
include '../../../keamanan/koneksi.php';

// Cek apakah terdapat data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data yang dikirimkan melalui form
    $id_guru = $_POST['id_guru'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi data
    if (empty($nama) || empty($username) || empty($password)) {
        echo "data tidak lengkap";
        exit();
    }
    // Cek apakah username sudah ada di tabel admin
    $check_query_admin = "SELECT * FROM admin WHERE username = '$username'";
    $result_admin = mysqli_query($koneksi, $check_query_admin);
    if (mysqli_num_rows($result_admin) > 0) {
        echo "error_username_exists"; // Kirim respon "error_username_exists" jika username sudah terdaftar
        exit();
    }
    // Cek apakah username sudah ada di tabel guru
    $check_query_guru = "SELECT * FROM guru WHERE username = '$username' AND id_guru != '$id_guru'";
    $result_guru = mysqli_query($koneksi, $check_query_guru);
    if (mysqli_num_rows($result_guru) > 0) {
        echo "error_username_exists"; // Kirim respon "error_username_exists" jika username sudah terdaftar
        exit();
    }

    // Cek apakah username sudah ada di tabel kepsek
    $check_query_kepsek = "SELECT * FROM kepsek WHERE username = '$username'";
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
    // Query SQL untuk update data foto profile
    $query = "UPDATE guru SET username='$username', password='$password', nama='$nama' WHERE id_guru='$id_guru'";

    // Lakukan proses update data foto profile di database
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "success";
        exit();
    } else {
        // Jika terjadi kesalahan saat melakukan proses update, tampilkan pesan kesalahan
        echo "Gagal melakukan proses update data foto profile: " . mysqli_error($koneksi);
    }
} else {
    // Jika metode request bukan POST, berikan respons yang sesuai
    echo "Invalid request method";
    exit();
}

// Tutup koneksi ke database
mysqli_close($koneksi);
