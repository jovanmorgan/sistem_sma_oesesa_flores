<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_bk = $_POST['id_bk'];
$id_guru = $_POST['id_guru'];
$id_siswa = $_POST['id_siswa'];
$tanggal = $_POST['tanggal'];
$hasil = $_POST['hasil'];
$tindakan = $_POST['tindakan'];

// Lakukan validasi data
if (empty($id_guru) || empty($id_siswa) || empty($tanggal) || empty($hasil) || empty($tindakan)) {
    echo "data_tidak_lengkap";
    exit();
}
// Format tanggal ke format yang diinginkan
$tanggal_formatted = date('d-M-Y', strtotime($tanggal));

// Buat query SQL untuk mengupdate data di tabel bk
$query = "UPDATE bk SET 
            id_guru = '$id_guru', 
            id_siswa = '$id_siswa', 
            tanggal = '$tanggal_formatted', 
            hasil = '$hasil', 
            tindakan = '$tindakan' 
            WHERE id_bk = '$id_bk'";

// Jalankan query
if (mysqli_query($koneksi, $query)) {
    echo "success";
} else {
    echo "error: " . mysqli_error($koneksi);
}

// Tutup koneksi ke database
mysqli_close($koneksi);
