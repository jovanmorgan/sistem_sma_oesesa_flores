<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$kelas = $_POST['kelas'];
$id_jurusan = $_POST['id_jurusan'];

// Lakukan validasi data
if (empty($id_jurusan) || empty($kelas)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menambahkan data kepsek ke dalam database
$query = "INSERT INTO kelas (kelas, id_jurusan) 
        VALUES ('$kelas','$id_jurusan')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
