<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$id_siswa = $_POST['id_siswa'];
$jk = $_POST['jk'];
$pekerjaan = $_POST['pekerjaan'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

// Lakukan validasi data
if (empty($username) || empty($password) || empty($nama) || empty($id_siswa) || empty($jk) || empty($pekerjaan) || empty($agama) || empty($alamat) || empty($no_hp)) {
    echo "data_tidak_lengkap";
    exit();
}

// Cek apakah username sudah ada di database
$check_query = "SELECT * FROM guru WHERE username = '$username'";
$result = mysqli_query($koneksi, $check_query);
if (mysqli_num_rows($result) > 0) {
    echo "error_username_exists"; // Kirim respon "error_email_exists" jika email sudah terdaftar
    exit();
}
// Cek apakah username sudah ada di database
$check_query_admin = "SELECT * FROM admin WHERE username = '$username'";
$result_admin = mysqli_query($koneksi, $check_query_admin);
if (mysqli_num_rows($result_admin) > 0) {
    echo "error_username_exists"; // Kirim respon "error_email_exists" jika email sudah terdaftar
    exit();
}
// Cek apakah username sudah ada di database
$check_query_kepsek = "SELECT * FROM kepsek WHERE username = '$username'";
$result_kepsek = mysqli_query($koneksi, $check_query_kepsek);
if (mysqli_num_rows($result_kepsek) > 0) {
    echo "error_username_exists"; // Kirim respon "error_email_exists" jika email sudah terdaftar
    exit();
}
// Cek apakah username sudah ada di database
$check_query_ortu = "SELECT * FROM ortu WHERE username = '$username'";
$result_ortu = mysqli_query($koneksi, $check_query_ortu);
if (mysqli_num_rows($result_ortu) > 0) {
    echo "error_username_exists"; // Kirim respon "error_email_exists" jika email sudah terdaftar
    exit();
}

// Cek apakah username sudah ada di database
$check_query_siswa = "SELECT * FROM siswa WHERE username = '$username'";
$result_siswa = mysqli_query($koneksi, $check_query_siswa);
if (mysqli_num_rows($result_siswa) > 0) {
    echo "error_username_exists"; // Kirim respon "error_email_exists" jika email sudah terdaftar
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

// Ganti "0" dengan "62" pada nomor telepon jika dimulai dengan "0"
if (substr($no_hp, 0, 1) === '0') {
    $no_hp = '62' . substr($no_hp, 1);
}

// Konversi tag <br> kembali menjadi newline (\n)
$alamat_data = str_replace('<br>', "\n", $alamat);

// Buat query SQL untuk menambahkan data ortu ke dalam database
$query = "INSERT INTO ortu (nama, username, password, id_siswa, jk, pekerjaan, agama, alamat, no_hp) 
        VALUES ('$nama','$username', '$password', '$id_siswa', '$jk', '$pekerjaan', '$agama', '$alamat_data', '$no_hp')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
