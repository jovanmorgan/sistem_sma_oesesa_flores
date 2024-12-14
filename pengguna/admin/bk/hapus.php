<?php
include '../../../keamanan/koneksi.php';

// Terima ID bk yang akan dihapus dari formulir HTML
$id_bk = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_bk)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menghapus data bk berdasarkan ID
$query_delete_bk = "DELETE FROM bk WHERE id_bk = '$id_bk'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_bk)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
