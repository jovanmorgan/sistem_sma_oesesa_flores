<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_jurusan = $_POST['id_jurusan'];
$jurusan = $_POST['jurusan'];

// Lakukan validasi data
if (empty($jurusan)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk mengupdate data jurusan ke dalam database
$query = "UPDATE jurusan SET 
            jurusan = '$jurusan'
            WHERE id_jurusan = '$id_jurusan'";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
