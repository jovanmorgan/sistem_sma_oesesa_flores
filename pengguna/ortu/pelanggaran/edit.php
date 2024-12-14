<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_pelanggaran = $_POST['id_pelanggaran'];
$nama_pelanggaran = $_POST['nama_pelanggaran'];
$tanggal = $_POST['tanggal'];
$id_ortu = $_POST['id_ortu'];
$id_siswa = $_POST['id_siswa'];
$id_sanksi = $_POST['id_sanksi'];

// Lakukan validasi data
if (empty($id_pelanggaran) || empty($nama_pelanggaran) || empty($tanggal) || empty($id_ortu) || empty($id_siswa) || empty($id_sanksi)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk mengupdate data di tabel pelanggaran
$query = "UPDATE pelanggaran SET 
            nama_pelanggaran = '$nama_pelanggaran', 
            tanggal = '$tanggal', 
            id_ortu = '$id_ortu', 
            id_siswa = '$id_siswa', 
            id_sanksi = '$id_sanksi' 
          WHERE id_pelanggaran = '$id_pelanggaran'";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error: " . mysqli_error($koneksi);
}

// Tutup koneksi ke database
mysqli_close($koneksi);
