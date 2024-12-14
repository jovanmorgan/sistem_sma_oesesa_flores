<?php
session_start();

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['id_admin'])) {
    // Pengguna belum masuk, arahkan kembali ke halaman masuk.php
    header("Location: ../../berlangganan/login_pegunah");
    exit; // Pastikan untuk menghentikan eksekusi skrip setelah mengarahkan
}

// Jika pengguna sudah masuk, Anda dapat melanjutkan menampilkan halaman admin.php seperti biasa
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../images/logo.png">
    <title>
        DATA ORANG TUA
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .nav ul {
            display: none;
            list-style: none;
            padding-left: 20px;
        }

        .nav li.active>ul {
            display: block;
        }

        .nav li a {
            cursor: pointer;
        }
    </style>
</head>

<body class="dark-content" translate="no">
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-wrapper badge-info">
                <div class="logo">
                    <a href="javascript:void(0)" class="simple-text logo-mini">
                        <img src="../../images/logo.png" width="50px" alt="" style="position: relative; bottom: 3px;">
                    </a>
                    <a href="javascript:void(0)" class="simple-text logo-normal position-relative" style="font-size: 14px; font-weight: bold; font-style: italic; right: 5px; color: #ffffff;" translate="no">
                        SMK Negeri 1 AESESA
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a href="./dashboard">
                            <i class="tim-icons icon-chart-pie-36"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <!-- Master -->
                    <li class="menu-item">
                        <a onclick="toggleMenu(this)">
                            <i class="tim-icons icon-components"></i>
                            <p>Master</p>
                        </a>
                        <ul>
                            <li>
                                <a href="./admin_data_siswa">
                                    <i class="tim-icons icon-single-02"></i> <!-- Ikon orang -->
                                    <p>Data Siswa</p>
                                </a>
                            </li>
                            <li class="active">
                                <a href="./admin_data_ortu">
                                    <i class="fas fa-users"></i> <!-- Ikon kelompok orang -->
                                    <p>Data Orang Tua</p>
                                </a>
                            </li>
                            <li>
                                <a href="./admin_data_guru">
                                    <i class="tim-icons icon-single-02"></i> <!-- Ikon orang -->
                                    <p>Guru BK</p>
                                </a>
                            </li>
                            <li>
                                <a href="./admin_data_kelas">
                                    <i class="tim-icons icon-bank"></i> <!-- Ikon bangunan -->
                                    <p>Kelas</p>
                                </a>
                            </li>
                            <li>
                                <a href="./admin_data_jurusan">
                                    <i class="tim-icons icon-book-bookmark"></i> <!-- Ikon buku -->
                                    <p>Jurusan</p>
                                </a>
                            </li>
                            <li>
                                <a href="./admin_data_kepsek">
                                    <i class="tim-icons icon-badge"></i> <!-- Ikon lencana -->
                                    <p>Data Kepala Sekolah</p>
                                </a>
                            </li>
                            <li style="opacity: 0;">
                                <a href="./guru_data_Report">
                                    <i class="tim-icons icon-chart-bar-32"></i>
                                    <p>Data</p>
                                </a>
                            </li>
                            <br>
                            <br>
                        </ul>
                    </li>
                    <!-- Akhir Master -->

                    <!-- Klarifikasi Pelanggaran -->
                    <li class="menu-item">
                        <a onclick="toggleMenu(this)">
                            <i class="tim-icons icon-alert-circle-exc"></i>
                            <p>Klarifikasi Pelanggaran</p>
                        </a>
                        <ul>
                            <li>
                                <a href="./admin_data_pelanggaran">
                                    <i class="tim-icons icon-alert-circle-exc"></i> <!-- Ikon peringatan -->
                                    <p>Pelanggaran</p>
                                </a>
                            </li>
                            <li>
                                <a href="./admin_data_sanksi">
                                    <i class="tim-icons icon-alert-circle-exc"></i> <!-- Ikon peringatan -->
                                    <p>Sanksi</p>
                                </a>
                            </li>
                            <li>
                                <a href="./admin_data_bk">
                                    <i class="tim-icons icon-notes"></i> <!-- Ikon catatan -->
                                    <p>Bimbingan Konseling</p>
                                </a>
                            </li>
                            <li style="opacity: 0;">
                                <a href="./guru_data_Report">
                                    <i class="tim-icons icon-chart-bar-32"></i>
                                    <p>Data</p>
                                </a>
                            </li>
                            <br>
                            <br>
                        </ul>
                    </li>
                    <!-- Akhir Klarifikasi Pelanggaran -->
                </ul>
            </div>
        </div>
        <script>
            function toggleMenu(element) {
                element.parentElement.classList.toggle("active");
            }
        </script>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:void(0)">Dashboard Admin</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="search-bar input-group">
                                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                                    <span class="d-lg-none d-md-block">Search</span>
                                </button>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <div class="photo">
                                        <?php
                                        // Lakukan koneksi ke database
                                        include '../../keamanan/koneksi.php';

                                        // Periksa apakah session id_admin telah diset
                                        if (isset($_SESSION['id_admin'])) {
                                            $id_admin = $_SESSION['id_admin'];

                                            // Query SQL untuk mengambil data admin berdasarkan id_admin dari session
                                            $query = "SELECT * FROM admin WHERE id_admin = '$id_admin'";
                                            $result = mysqli_query($koneksi, $query);

                                            // Periksa apakah query berhasil dieksekusi
                                            if ($result) {
                                                // Periksa apakah terdapat data admin
                                                if (mysqli_num_rows($result) > 0) {
                                                    // Ambil data admin sebagai array asosiatif
                                                    $admin = mysqli_fetch_assoc($result);
                                        ?>
                                                    <?php if (!empty($admin['fp'])) : ?>
                                                        <img class="avatar" src="data_fp/<?php echo $admin['fp']; ?>" alt="...">
                                                    <?php else : ?>
                                                        <img class="avatar" src="../../assets/img/anime3.png" alt="Profile Photo">
                                                    <?php endif; ?>
                                                    <h5 class="title">
                                                        <?php echo $admin['id_admin']; ?>
                                                    </h5>
                                        <?php
                                                } else {
                                                    // Jika tidak ada data admin
                                                    echo "Tidak ada data admin.";
                                                }
                                            } else {
                                                // Jika query tidak berhasil dieksekusi
                                                echo "Gagal mengambil data admin: " . mysqli_error($koneksi);
                                            }
                                        } else {
                                            // Jika session id_admin tidak diset
                                            echo "Session id_admin tidak tersedia.";
                                        }

                                        // Tutup koneksi ke database
                                        mysqli_close($koneksi);
                                        ?>

                                    </div>
                                    <b class="caret d-none d-lg-block d-xl-block"></b>
                                    <p class="d-lg-none">
                                        Log out
                                    </p>
                                </a>
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li class="nav-link"><a href="foto_profile" class="nav-item dropdown-item">Profile</a></li>
                                    <li class="nav-link"><a href="logout" class="nav-item dropdown-item">Log
                                            out</a></li>
                                </ul>
                            </li>
                            <li class="separator d-lg-none"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="" method="GET">
                            <div class="modal-header">
                                <input type="text" name="search_query" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->

            <!-- Tambahkan style CSS di bagian head atau style sheet Anda -->
            <style>
                .modal-body .form-control {
                    color: #000;
                    /* Warna teks hitam */
                }
            </style>

            <!-- Modal Tambah Data -->
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambah" style="font-size: 250%;">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size: 240%;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk menambahkan data tambah -->
                            <form id="form_tambah" action="ortu/tambah.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="text" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_siswa">Siswa:</label>
                                    <select class="form-control" id="id_siswa" name="id_siswa" required>
                                        <option value="" selected>Silakan Pilih</option>
                                        <?php
                                        include '../../keamanan/koneksi.php';

                                        // Query untuk mendapatkan data siswa dan kelas terkait
                                        $query = "SELECT siswa.id_siswa, siswa.nama, kelas.kelas, jurusan.jurusan
                                      FROM siswa 
                                      JOIN kelas ON siswa.id_kelas = kelas.id_kelas
                                      JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan";
                                        $result = $koneksi->query($query);

                                        if ($result) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id_siswa'] . "'>" . $row['nama'] . " - " . $row['kelas'] . " - " . $row['jurusan'] . "</option>";
                                            }
                                            $result->free();
                                        } else {
                                            echo "Gagal mengeksekusi query: " . $koneksi->error;
                                        }

                                        $koneksi->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan:</label>
                                    <select class="form-control" id="pekerjaan" name="pekerjaan" required>
                                        <option value="">Pilih Pekerjaan</option>
                                        <option value="Petani">Petani</option>
                                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                                        <option value="Nelayan">Nelayan</option>
                                        <option value="Guru">Guru</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin:</label>
                                    <select class="form-control" id="jk" name="jk" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama:</label>
                                    <select class="form-control" id="agama" name="agama" required>
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor Hp:</label>
                                    <input type="number" min="0" class="form-control" id="no_hp" name="no_hp" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel" style="font-size: 250%;">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size: 240%;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk mengedit data ortu -->
                            <form id="form_edit" action="ortu/edit.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" id="editid_ortu" name="id_ortu">
                                <div class="form-group">
                                    <label for="editnama">Nama:</label>
                                    <input type="text" class="form-control" id="editnama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="editusername">Username:</label>
                                    <input type="text" class="form-control" id="editusername" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="editpassword">Password:</label>
                                    <input type="text" class="form-control" id="editpassword" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_siswa">Siswa:</label>
                                    <select class="form-control" id="editid_siswa" name="id_siswa" required>
                                        <option value="" selected>Silakan Pilih</option>
                                        <?php
                                        include '../../keamanan/koneksi.php';

                                        // Query untuk mendapatkan data siswa dan kelas terkait
                                        $query = "SELECT siswa.id_siswa, siswa.nama, kelas.kelas, jurusan.jurusan
                                      FROM siswa 
                                      JOIN kelas ON siswa.id_kelas = kelas.id_kelas
                                      JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan";
                                        $result = $koneksi->query($query);

                                        if ($result) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id_siswa'] . "'>" . $row['nama'] . " - " . $row['kelas'] . " - " . $row['jurusan'] . "</option>";
                                            }
                                            $result->free();
                                        } else {
                                            echo "Gagal mengeksekusi query: " . $koneksi->error;
                                        }

                                        $koneksi->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan:</label>
                                    <select class="form-control" id="editpekerjaan" name="pekerjaan" required>
                                        <option value="">Pilih Pekerjaan</option>
                                        <option value="Petani">Petani</option>
                                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                                        <option value="Nelayan">Nelayan</option>
                                        <option value="Guru">Guru</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin:</label>
                                    <select class="form-control" id="editjk" name="jk" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama:</label>
                                    <select class="form-control" id="editagama" name="agama" required>
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <textarea class="form-control" id="editalamat" name="alamat" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor Hp:</label>
                                    <input type="number" min="0" class="form-control" id="editno_hp" name="no_hp" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function openEditModal(id_ortu, nama, username, password, id_siswa, agama, pekerjaan, no_hp, jk, alamat) {
                    // Isi data ke dalam form edit
                    alamat_data = alamat.replace(/<br\s*\/?>/gi, '\n');
                    document.getElementById('editid_ortu').value = id_ortu;
                    document.getElementById('editnama').value = nama;
                    document.getElementById('editusername').value = username;
                    document.getElementById('editpassword').value = password;
                    document.getElementById('editid_siswa').value = id_siswa;
                    document.getElementById('editpekerjaan').value = pekerjaan;
                    document.getElementById('editagama').value = agama;
                    document.getElementById('editjk').value = jk;
                    document.getElementById('editalamat').value = alamat_data;
                    document.getElementById('editno_hp').value = no_hp;
                    $('#editModal').modal('show');
                }
            </script>

            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="places-buttons">
                                    <div class="row">
                                        <div class="col-md-6 ml-auto mr-auto text-center">
                                            <h2 class="card-title">
                                                Data Orang Tua
                                            </h2>

                                            <p class="category">Clik untuk menambah data ortu</p>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 ml-auto mr-auto">
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-md-4">
                                                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalTambah">Tambah </button>
                                                    <!-- Tombol alat_export -->
                                                    <a href="ortu/export" target="_blank" class="btn btn-info btn-block" data-toggle="tooltip" data-original-title="Edit user">
                                                        EXPORT DATA
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .column-fixed {
                            white-space: nowrap;
                        }

                        .column-wide {
                            white-space: nowrap;
                            min-width: 200px;
                            /* Sesuaikan dengan kebutuhan Anda */
                        }
                    </style>

                    <div class="col-md-12" translate="no">
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center column-fixed">Nomor</th>
                                                <th class="text-center column-fixed">Nama</th>
                                                <th class="text-center column-fixed">Username</th>
                                                <th class="text-center column-fixed">Password</th>
                                                <th class="text-center column-fixed">Anak</th>
                                                <th class="text-center column-fixed">Agama</th>
                                                <th class="text-center column-fixed">Pekerjaan</th>
                                                <th class="text-center column-fixed">Nomor Hp</th>
                                                <th class="text-center column-fixed">Jenis Kelamin</th>
                                                <th class="text-center column-fixed">Alamat</th>
                                                <th class="text-center column-fixed">Edit</th>
                                                <th class="text-center column-fixed">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../keamanan/koneksi.php';

                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                            $query = "SELECT ortu.*, siswa.nama AS nama_siswa
                                            FROM ortu
                                            LEFT JOIN siswa ON ortu.id_siswa = siswa.id_siswa";
                                            if (!empty($search_query)) {
                                                $query .= " WHERE ortu.nama LIKE '%$search_query%' OR ortu.username LIKE '%$search_query%' OR ortu.password LIKE '%$search_query%' OR ortu.agama LIKE '%$search_query%' OR ortu.jk LIKE '%$search_query%' OR ortu.pekerjaan LIKE '%$search_query%' OR ortu.alamat LIKE '%$search_query%' OR siswa.nama LIKE '%$search_query%'";
                                            }
                                            $query .= " ORDER BY id_ortu DESC";
                                            $result = mysqli_query($koneksi, $query);
                                            $counter = 1;

                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $alamat_sambung = str_replace(array("\r", "\n"), '', nl2br($row['alamat']));
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'><p class='button-like text-white'>" . $row['username'] . "</p></td>";
                                                    echo "<td class='text-center'><p class='button-like text-white'>" . $row['password'] . "</p></td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama_siswa'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['agama'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['pekerjaan'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['no_hp'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['jk'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . $alamat_sambung . "</td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-primary btn-sm' onclick='openEditModal(
                                                                \"" . htmlspecialchars($row['id_ortu'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['nama'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['username'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['password'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['id_siswa'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['agama'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['pekerjaan'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['no_hp'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['jk'], ENT_QUOTES) . "\",
                                                                \"" . $alamat_sambung . "\"
                                                            )'>Edit</button>
                                                        </td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_ortu'], ENT_QUOTES) . "\")'>Hapus</button>
                                                        </td>";
                                                    echo "</tr>";
                                                    $counter++;
                                                }
                                            } else {
                                                echo "<td class='text-center' colspan='7'><h3>Gagal mengambil data dari database</h3></td>";
                                            }
                                            mysqli_close($koneksi);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .button-like {
                    display: inline-block;
                    padding: 7px 20px;
                    background-color: #007bff;
                    border: 1px solid #ccc;
                    border-radius: 10px;
                    cursor: default;
                    color: #fff;
                }
            </style>
            <footer class="footer">
                <div class="container-fluid">
                    <ul class="nav">

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">
                                About Us
                            </a>
                        </li>

                    </ul>
                    <div class="copyright">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Dibuat Oleh Lilis
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--=============== LOADING ===============-->
    <div class="loading">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <style>
        .loading {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            /* Mula-mula, loading disembunyikan */
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Menempatkan loading di atas elemen lain */
            height: 100vh;
            width: 100vw;
            background-color: rgba(255, 255, 255, 0.932);
            /* Menambahkan latar belakang semi transparan */
        }

        .circle {
            width: 20px;
            height: 20px;
            background-color: #41a506;
            border-radius: 50%;
            margin: 0 10px;
            animation: bounce 0.5s infinite alternate;
        }

        .circle:nth-child(2) {
            animation-delay: 0.2s;
        }

        .circle:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes bounce {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-20px);
            }
        }
    </style>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        const loding = document.querySelector('.loading');

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form_tambah').addEventListener('submit', function(event) {
                event.preventDefault(); // Menghentikan aksi default form submit

                var form = this;
                var formData = new FormData(form);

                // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                loding.style.display = 'flex';

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'ortu/tambah.php', true);
                xhr.onload = function() {
                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        var response = xhr.responseText.trim();
                        console.log(response); // Debugging

                        if (response === 'success') {
                            form.reset();
                            $('#modalTambah').modal('hide');
                            loadTable();
                            swal("Berhasil!", "Data berhasil ditambahkan", "success").then(() => {});
                        } else if (response === 'data_tidak_lengkap') {
                            swal("Error", "Data yang anda masukan belum lengkap", "info");
                        } else if (response === 'error_username_exists') {
                            swal("Error", "Data Username Sudah Ada Silakan Gunakan data Username lain", "info");
                        } else if (response === 'error_password_length') {
                            swal("Password Salah!", "Password harus lebih dari 8 karakter", "info");
                        } else if (response === 'error_password_strength') {
                            swal("Password Lemah!", "Password harus mengandung huruf besar, huruf kecil, dan angka", "info");
                        } else {
                            swal("Error", "Gagal menambahkan data", "error");
                        }
                    } else {
                        swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                    }
                };
                xhr.send(formData);
            });
        });

        // logika untuk mengedit Data
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form_edit').addEventListener('submit', function(event) {
                event.preventDefault(); // Menghentikan aksi default form submit

                var form = this;
                var formData = new FormData(form);
                // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                loding.style.display = 'flex';

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'ortu/edit.php', true);
                xhr.onload = function() {

                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        var response = xhr.responseText.trim();
                        console.log(response); // Debugging

                        if (response === 'success') {
                            form.reset();
                            $('#editModal').modal('hide');
                            loadTable();
                            swal("Berhasil!", "Data berhasil diedit", "success").then(() => {});
                        } else if (response === 'data_tidak_lengkap') {
                            swal("Error", "Data yang anda masukan belum lengkap", "info");
                        } else if (response === 'error_username_exists') {
                            swal("Error", "Data Username Sudah Ada Silakan Gunakan data Username lain", "info");
                        } else if (response === 'error_password_length') {
                            swal("Password Salah!", "Password harus lebih dari 8 karakter", "info");
                        } else if (response === 'error_password_strength') {
                            swal("Password Lemah!", "Password harus mengandung huruf besar, huruf kecil, dan angka", "info");
                        } else {
                            swal("Error", "Gagal mengedit data", "error");
                        }
                    } else {
                        swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                    }
                };
                xhr.send(formData);
            });
        });

        // logika untuk menghapus data video
        function hapus(id) {
            swal({
                    title: "Apakah Anda yakin?",
                    text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
                    icon: "warning",
                    buttons: ["Batal", "Ya, hapus!"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // Jika pengguna mengonfirmasi untuk menghapus
                        var xhr = new XMLHttpRequest();

                        // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                        loding.style.display = 'flex';

                        xhr.open('POST', 'ortu/hapus.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onload = function() {

                            // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                            loding.style.display = 'none';

                            if (xhr.status === 200) {
                                var response = xhr.responseText;
                                if (response === 'success') {
                                    swal("Sukses!", "Data berhasil dihapus.", "success")
                                    loadTable();
                                } else {
                                    swal("Error", "Gagal menghapus Data.", "error");
                                }
                            } else {
                                swal("Error", "Terjadi kesalahan saat mengirim data.", "error");
                            }
                        };
                        xhr.send("id=" + id);
                    } else {
                        // Jika pengguna membatalkan penghapusan
                        swal("Penghapusan dibatalkan", {
                            icon: "info",
                        });
                    }
                });
        }


        function loadTable() {
            var xhrTable = new XMLHttpRequest();
            xhrTable.onreadystatechange = function() {
                if (xhrTable.readyState == 4 && xhrTable.status == 200) {
                    // Perbarui konten tabel dengan respons dari server
                    document.getElementById('dataTable').innerHTML = xhrTable.responseText;
                }
            };
            xhrTable.open('GET', 'ortu/load_table.php', true);
            xhrTable.send();
        }
    </script>


    <!--   Core JS Files   -->
    <script src="../../assets/js/core/jquery.min.js"></script>
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/black-dashboard.min.js?v=1.0.0"></script>
    <!-- Black Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../assets/demo/demo.js"></script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "black-dashboard-free"
            });
    </script>
</body>

</html>