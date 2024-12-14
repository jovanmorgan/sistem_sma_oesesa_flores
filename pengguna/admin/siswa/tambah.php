<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
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
if (empty($nama) || empty($username) || empty($password) || empty($nis) || empty($id_kelas) || empty($jk) || empty($tgl_lahir) || empty($agama) || empty($alamat)) {
    echo "data_tidak_lengkap";
    exit();
}

// Cek apakah username sudah ada di database (Tabel Guru)
$check_query_guru = "SELECT * FROM guru WHERE username = '$username'";
$result_guru = mysqli_query($koneksi, $check_query_guru);
if (mysqli_num_rows($result_guru) > 0) {
    echo "error_username_exists";
    exit();
}

// Cek apakah username sudah ada di database (Tabel Admin)
$check_query_admin = "SELECT * FROM admin WHERE username = '$username'";
$result_admin = mysqli_query($koneksi, $check_query_admin);
if (mysqli_num_rows($result_admin) > 0) {
    echo "error_username_exists";
    exit();
}

// Cek apakah username sudah ada di database (Tabel Kepsek)
$check_query_kepsek = "SELECT * FROM kepsek WHERE username = '$username'";
$result_kepsek = mysqli_query($koneksi, $check_query_kepsek);
if (mysqli_num_rows($result_kepsek) > 0) {
    echo "error_username_exists";
    exit();
}

// Cek apakah username sudah ada di database (Tabel Ortu)
$check_query_ortu = "SELECT * FROM ortu WHERE username = '$username'";
$result_ortu = mysqli_query($koneksi, $check_query_ortu);
if (mysqli_num_rows($result_ortu) > 0) {
    echo "error_username_exists";
    exit();
}

// Cek apakah username sudah ada di database (Tabel Siswa)
$check_query_siswa = "SELECT * FROM siswa WHERE username = '$username'";
$result_siswa = mysqli_query($koneksi, $check_query_siswa);
if (mysqli_num_rows($result_siswa) > 0) {
    echo "error_username_exists";
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

// Format tanggal ke format yang diinginkan
$tanggal_formatted = date('d-M-Y H:i', strtotime($tgl_lahir));

// Konversi tag <br> kembali menjadi newline (\n)
$alamat_data = str_replace('<br>', "\n", $alamat);

// Buat query SQL untuk menambahkan data siswa ke dalam database
$query = "INSERT INTO siswa (nama, username, password, nis, id_kelas, jk, tgl_lahir, agama, alamat) 
        VALUES ('$nama','$username', '$password', '$nis', '$id_kelas', '$jk', '$tanggal_formatted', '$agama', '$alamat_data')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
