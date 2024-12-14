<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_sanksi = $_POST['id_sanksi'];
$sanksi = $_POST['sanksi'];

// Lakukan validasi data
if (empty($sanksi)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk mengupdate data sanksi ke dalam database
$query = "UPDATE sanksi SET 
            sanksi = '$sanksi'
            WHERE id_sanksi = '$id_sanksi'";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
