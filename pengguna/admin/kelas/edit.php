<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_kelas = $_POST['id_kelas'];
$kelas = $_POST['kelas'];
$id_jurusan = $_POST['id_jurusan'];

// Lakukan validasi data
if (empty($id_kelas) || empty($id_jurusan) || empty($kelas)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk mengupdate data kelas di dalam database
$query = "UPDATE kelas SET kelas='$kelas', id_jurusan='$id_jurusan' WHERE id_kelas='$id_kelas'";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
