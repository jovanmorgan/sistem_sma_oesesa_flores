<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$jurusan = $_POST['jurusan'];

// Lakukan validasi data
if (empty($jurusan)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menambahkan data kepsek ke dalam database
$query = "INSERT INTO jurusan (jurusan) 
        VALUES ('$jurusan')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
