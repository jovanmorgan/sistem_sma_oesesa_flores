<?php
include '../../../keamanan/koneksi.php';

// Terima ID sanksi yang akan dihapus dari formulir HTML
$id_sanksi = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_sanksi)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menghapus data sanksi berdasarkan ID
$query_delete_sanksi = "DELETE FROM sanksi WHERE id_sanksi = '$id_sanksi'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_sanksi)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
