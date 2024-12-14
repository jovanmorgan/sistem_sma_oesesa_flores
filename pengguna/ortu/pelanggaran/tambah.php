<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$nama_pelanggaran = $_POST['nama_pelanggaran'];
$tanggal = $_POST['tanggal'];
$id_ortu = $_POST['id_ortu'];
$id_siswa = $_POST['id_siswa'];
$id_sanksi = $_POST['id_sanksi'];

// Lakukan validasi data
if (empty($nama_pelanggaran) || empty($tanggal) || empty($id_ortu) || empty($id_siswa) || empty($id_sanksi)) {
    echo "data_tidak_lengkap";
    exit();
}

// Buat query SQL untuk menambahkan data ke dalam tabel pelanggaran
$query = "INSERT INTO pelanggaran (nama_pelanggaran, tanggal, id_ortu, id_siswa, id_sanksi) 
          VALUES ('$nama_pelanggaran', '$tanggal', '$id_ortu', '$id_siswa', '$id_sanksi')";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error: " . mysqli_error($koneksi);
}

// Tutup koneksi ke database
mysqli_close($koneksi);
