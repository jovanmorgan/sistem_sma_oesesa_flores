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
        Bimbingan dan Konseling SMK Negeri 1 AESESA | Admin Dashboard
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
                    <li class="active">
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
                            <li>
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

                    <li>
                        <a href="./admin_data_bk">
                            <i class="tim-icons icon-notes"></i>
                            <p>Bimibingan Konseling</p>
                        </a>
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
                        <div class="modal-header">
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="places-buttons">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h2 class="card-title stylish-title">
                                                Selamat Datang Di Website Bimbingan dan Konseling SMK Negeri 1 AESESA
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        .stylish-title {
                            font-family: 'Arial Black', Gadget, sans-serif;
                            font-size: 2em;
                            color: #6495ED;
                            /* Menggunakan Cornflower Blue */
                            text-transform: uppercase;
                            letter-spacing: 2px;
                            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
                            background: linear-gradient(to right, #6495ED, #6495ED);
                            /* Menggunakan warna biru yang sama untuk gradasi */
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            padding: 10px 0;
                            width: 100%;
                        }

                        .card-chart {
                            transition: transform 0.3s, box-shadow 0.3s;
                            cursor: pointer;
                        }

                        .card-chart:hover {
                            transform: translateY(-10px);
                            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
                        }

                        .card-category {
                            font-weight: bold;
                            color: #00c853;
                        }

                        .card-title i {
                            font-size: 2em;
                            margin-right: 10px;
                            color: #6495ED;
                        }

                        .card-body p {
                            margin: 0;
                            font-size: 1.1em;
                        }
                    </style>

                    <!-- Section for Total Dashboard -->
                    <?php
                    // Include the database connection file
                    include '../../keamanan/koneksi.php';

                    // Define queries for each table
                    $queries = [
                        "SELECT COUNT(*) AS total FROM guru",
                        "SELECT COUNT(*) AS total FROM kepsek",
                        "SELECT COUNT(*) AS total FROM ortu",
                        "SELECT COUNT(*) AS total FROM siswa",
                        "SELECT COUNT(*) AS total FROM pelanggaran",
                        "SELECT COUNT(*) AS total FROM bk",
                        "SELECT COUNT(*) AS total FROM sanksi",
                        "SELECT COUNT(*) AS total FROM kelas",
                        "SELECT COUNT(*) AS total FROM jurusan"
                    ];

                    // Initialize the total count
                    $total_count = 0;

                    // Execute each query and add the count to the total
                    foreach ($queries as $query) {
                        $result = mysqli_query($koneksi, $query);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $total_count += $row['total'];
                        }
                    }

                    // Close the database connection
                    mysqli_close($koneksi);
                    ?>
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./dashboard'">
                            <div class="card-header">
                                <h5 class="card-category">Total Semua Data</h5>
                                <h3 class="card-title"><i class="tim-icons icon-chart-pie-36"></i> <?php echo $total_count; ?> Data</h3>
                            </div>
                            <div class="card-body p-4">
                                Semua Data pada Bimbingan dan Konseling SMK Negeri 1 AESESA
                            </div>
                        </div>
                    </div>

                    <!-- Other cards here -->

                    <!-- guru -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./admin_data_guru'">
                            <div class="card-header">
                                <h5 class="card-category">Total Guru</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_guru = "SELECT COUNT(*) AS total_guru FROM guru";
                                $result_count_guru = mysqli_query($koneksi, $query_count_guru);

                                if ($result_count_guru) {
                                    $row_count_guru = mysqli_fetch_assoc($result_count_guru);
                                    $total_data_guru = $row_count_guru['total_guru'];

                                    echo "<h3 class='card-title'><i class='tim-icons icon-single-02'></i> $total_data_guru Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4">
                                Jumlah data guru pada Bimbingan dan Konseling SMK Negeri 1 AESESA
                            </div>
                        </div>
                    </div>
                    <!-- kepsek -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./admin_data_kepsek'">
                            <div class="card-header">
                                <h5 class="card-category">Total Kepala Sekolah</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_kepsek = "SELECT COUNT(*) AS total_kepsek FROM kepsek";
                                $result_count_kepsek = mysqli_query($koneksi, $query_count_kepsek);

                                if ($result_count_kepsek) {
                                    $row_count_kepsek = mysqli_fetch_assoc($result_count_kepsek);
                                    $total_data_kepsek = $row_count_kepsek['total_kepsek'];

                                    echo "<h3 class='card-title'><i class='tim-icons icon-badge'></i> $total_data_kepsek Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4">
                                Jumlah data kepsek pada Bimbingan dan Konseling SMK Negeri 1 AESESA
                            </div>
                        </div>
                    </div>
                    <!-- ortu -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./admin_data_ortu'">
                            <div class="card-header">
                                <h5 class="card-category">Total Orang Tua</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_ortu = "SELECT COUNT(*) AS total_ortu FROM ortu";
                                $result_count_ortu = mysqli_query($koneksi, $query_count_ortu);

                                if ($result_count_ortu) {
                                    $row_count_ortu = mysqli_fetch_assoc($result_count_ortu);
                                    $total_data_ortu = $row_count_ortu['total_ortu'];

                                    echo "<h3 class='card-title'><i class='fas fa-users'></i> $total_data_ortu Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4">
                                Jumlah data ortu pada Bimbingan dan Konseling SMK Negeri 1 AESESA
                            </div>
                        </div>
                    </div>
                    <!-- siswa -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./admin_data_siswa'">
                            <div class="card-header">
                                <h5 class="card-category">Total Siswa</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_siswa = "SELECT COUNT(*) AS total_siswa FROM siswa";
                                $result_count_siswa = mysqli_query($koneksi, $query_count_siswa);

                                if ($result_count_siswa) {
                                    $row_count_siswa = mysqli_fetch_assoc($result_count_siswa);
                                    $total_data_siswa = $row_count_siswa['total_siswa'];

                                    echo "<h3 class='card-title'><i class='tim-icons icon-single-02'></i> $total_data_siswa Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4">
                                Jumlah data siswa pada Bimbingan dan Konseling SMK Negeri 1 AESESA
                            </div>
                        </div>
                    </div>
                    <!-- pelanggaran -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./admin_data_pelanggaran'">
                            <div class="card-header">
                                <h5 class="card-category">Total Pelanggaran</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_pelanggaran = "SELECT COUNT(*) AS total_pelanggaran FROM pelanggaran";
                                $result_count_pelanggaran = mysqli_query($koneksi, $query_count_pelanggaran);

                                if ($result_count_pelanggaran) {
                                    $row_count_pelanggaran = mysqli_fetch_assoc($result_count_pelanggaran);
                                    $total_data_pelanggaran = $row_count_pelanggaran['total_pelanggaran'];

                                    echo "<h3 class='card-title'><i class='tim-icons icon-alert-circle-exc'></i> $total_data_pelanggaran Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4">
                                Jumlah data pelanggaran pada Bimbingan dan Konseling SMK Negeri 1 AESESA
                            </div>
                        </div>
                    </div>
                    <!-- bk -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./admin_data_bk'">
                            <div class="card-header">
                                <h5 class="card-category">Total BK</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_bk = "SELECT COUNT(*) AS total_bk FROM bk";
                                $result_count_bk = mysqli_query($koneksi, $query_count_bk);

                                if ($result_count_bk) {
                                    $row_count_bk = mysqli_fetch_assoc($result_count_bk);
                                    $total_data_bk = $row_count_bk['total_bk'];

                                    echo "<h3 class='card-title'><i class='tim-icons icon-notes'></i> $total_data_bk Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4">
                                Jumlah data bk pada Bimbingan dan Konseling SMK Negeri 1 AESESA
                            </div>
                        </div>
                    </div>
                    <!-- sanksi -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./admin_data_sanksi'">
                            <div class="card-header">
                                <h5 class="card-category">Total Sanksi</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_sanksi = "SELECT COUNT(*) AS total_sanksi FROM sanksi";
                                $result_count_sanksi = mysqli_query($koneksi, $query_count_sanksi);

                                if ($result_count_sanksi) {
                                    $row_count_sanksi = mysqli_fetch_assoc($result_count_sanksi);
                                    $total_data_sanksi = $row_count_sanksi['total_sanksi'];

                                    echo "<h3 class='card-title'><i class='tim-icons icon-alert-circle-exc'></i> $total_data_sanksi Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4">
                                Jumlah data sanksi pada Bimbingan dan Konseling SMK Negeri 1 AESESA
                            </div>
                        </div>
                    </div>
                    <!-- kelas -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./admin_data_kelas'">
                            <div class="card-header">
                                <h5 class="card-category">Total Kelas</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_kelas = "SELECT COUNT(*) AS total_kelas FROM kelas";
                                $result_count_kelas = mysqli_query($koneksi, $query_count_kelas);

                                if ($result_count_kelas) {
                                    $row_count_kelas = mysqli_fetch_assoc($result_count_kelas);
                                    $total_data_kelas = $row_count_kelas['total_kelas'];

                                    echo "<h3 class='card-title'><i class='tim-icons icon-bank'></i> $total_data_kelas Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4">
                                Jumlah data kelas pada Bimbingan dan Konseling SMK Negeri 1 AESESA
                            </div>
                        </div>
                    </div>
                    <!-- jurusan -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./admin_data_jurusan'">
                            <div class="card-header">
                                <h5 class="card-category">Total Jurusan</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_jurusan = "SELECT COUNT(*) AS total_jurusan FROM jurusan";
                                $result_count_jurusan = mysqli_query($koneksi, $query_count_jurusan);

                                if ($result_count_jurusan) {
                                    $row_count_jurusan = mysqli_fetch_assoc($result_count_jurusan);
                                    $total_data_jurusan = $row_count_jurusan['total_jurusan'];

                                    echo "<h3 class='card-title'><i class='tim-icons icon-book-bookmark'></i> $total_data_jurusan Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4">
                                Jumlah data jurusan pada Bimbingan dan Konseling SMK Negeri 1 AESESA
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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