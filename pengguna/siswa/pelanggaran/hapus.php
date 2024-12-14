<?php
include '../../../keamanan/koneksi.php';

// Terima ID pelanggaran yang akan dihapus dari formulir HTML
$id_pelanggaran = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_pelanggaran)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menghapus data pelanggaran berdasarkan ID
$query_delete_pelanggaran = "DELETE FROM pelanggaran WHERE id_pelanggaran = '$id_pelanggaran'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $query_delete_pelanggaran)) {
    echo "success";
} else {
    echo "error";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
