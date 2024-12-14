<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_siswa = $_POST['id_siswa'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$nis = $_POST['nis'];
$id_kelas = $_POST['id_kelas'];
$jk = $_POST['jk'];
$tgl_lahir = $_POST['tgl_lahir'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];

// Lakukan validasi data
if (empty($id_siswa) || empty($nama) || empty($username) || empty($password) || empty($nis) || empty($id_kelas) || empty($jk) || empty($tgl_lahir) || empty($agama) || empty($alamat)) {
    echo "data_tidak_lengkap";
    exit();
}

// Validasi panjang password
if (strlen($password) < 8) {
    echo "error_password_length";
    exit();
}

// Validasi kekuatan password
if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/", $password)) {
    echo "error_password_strength";
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
$check_query_siswa = "SELECT * FROM siswa WHERE username = '$username' AND id_siswa != '$id_siswa'";
$result_siswa = mysqli_query($koneksi, $check_query_siswa);
if (mysqli_num_rows($result_siswa) > 0) {
    echo "error_username_exists"; // Kirim respon "error_username_exists" jika username sudah terdaftar
    exit();
}

// Format tanggal ke format yang diinginkan
$tanggal_formatted = date('d-M-Y H:i', strtotime($tgl_lahir));

// Konversi tag <br> kembali menjadi newline (\n)
$alamat_data = str_replace('<br>', "\n", $alamat);

// Buat query SQL untuk mengupdate data siswa dalam database
$query = "UPDATE siswa SET 
            nama = '$nama',
            username = '$username',
            password = '$password',
            nis = '$nis',
            id_kelas = '$id_kelas',
            jk = '$jk',
            tgl_lahir = '$tanggal_formatted',
            agama = '$agama',
            alamat = '$alamat_data'
          WHERE id_siswa = '$id_siswa'";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
