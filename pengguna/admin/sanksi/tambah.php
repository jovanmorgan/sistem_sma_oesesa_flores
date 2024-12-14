<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$sanksi = $_POST['sanksi'];

// Lakukan validasi data
if (empty($sanksi)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menambahkan data kepsek ke dalam database
$query = "INSERT INTO sanksi (sanksi) 
        VALUES ('$sanksi')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
