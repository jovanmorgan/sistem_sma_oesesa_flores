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
        Bimbingan dan Konseling SMK Negeri 1 AESESA | Lurah
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
                    <li>
                        <a href="./admin_data_guru">
                            <i class="tim-icons icon-single-02"></i> <!-- Ikon orang -->
                            <p>Guru</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin_data_kepsek">
                            <i class="tim-icons icon-badge"></i> <!-- Ikon lencana -->
                            <p>Kepala Sekolah</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin_data_ortu">
                            <i class="fas fa-users"></i> <!-- Ikon kelompok orang -->
                            <p>Orang Tua</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin_data_siswa">
                            <i class="tim-icons icon-single-02"></i> <!-- Ikon orang -->
                            <p>Siswa</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin_data_pelanggaran">
                            <i class="tim-icons icon-alert-circle-exc"></i> <!-- Ikon peringatan -->
                            <p>Pelanggaran</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin_data_bk">
                            <i class="tim-icons icon-notes"></i> <!-- Ikon catatan -->
                            <p>BK</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin_data_sanksi">
                            <i class="tim-icons icon-alert-circle-exc"></i> <!-- Ikon peringatan -->
                            <p>Sanksi</p>
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
                    <li style="opacity: 0;">
                        <a href="./admin_data_Report">
                            <i class="tim-icons icon-chart-bar-32"></i>
                            <p>Data</p>
                        </a>
                    </li>
                    <br>
                    <br>
                </ul>
            </div>
        </div>
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
                        <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
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
                                                    <h5 class="title"><?php echo $admin['nama']; ?></h5>
                                    </div>
                                    <b class="caret d-none d-lg-block d-xl-block"></b>
                                    <p class="d-lg-none">
                                        Log out
                                    </p>
                                </a>
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li class="nav-link active"><a href="foto_profile" class="nav-item dropdown-item">Profile</a></li>
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

            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <p class="card-text">
                                <div class="author">
                                    <div class="block block-one"></div>
                                    <div class="block block-two"></div>
                                    <div class="block block-three"></div>
                                    <div class="block block-four"></div>
                                    <a href="javascript:void(0)" onclick="document.getElementById('editFotoProfile').click()">
                                        <?php if (!empty($admin['fp'])) : ?>
                                            <img class="avatar" src="data_fp/<?php echo $admin['fp']; ?>" alt="...">
                                        <?php else : ?>
                                            <img class="avatar" src="../../assets/img/anime3.png" alt="...">
                                        <?php endif; ?>
                                        <h5 class="title"><?php echo $admin['nama']; ?></h5>
                                    </a>

                                    <!-- Input file tersembunyi untuk memilih gambar -->
                                    <input type="file" class="d-none" id="editFotoProfile" name="editFotoProfile" accept="image/*" onchange="previewAndUpdateProfile(this)">

                                    <!-- Modal untuk memilih gambar profile -->
                                    <div class="modal fade" id="editFotoProfileModal" tabindex="-1" role="dialog" aria-labelledby="editFotoProfileModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editFotoProfileModalLabel" style="font-size: 150%;">Edit Foto Profile</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload();">
                                                        <span aria-hidden="true" style="font-size: 140%;">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="gambar">
                                                        <img id="editFotoProfilePreview" src="#" alt="Preview Foto Profile">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload();">Close</button>
                                                    <button type="button" class="btn btn-primary" id="btnSaveProfile">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Edit Profile</h5>
                            </div>
                            <div class="card-body">
                                <form id="editDataFp">
                                    <div class="row">
                                        <input type="hidden" class="form-control" name="id_admin" id="id_admin" value="<?php echo $admin['id_admin']; ?>">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" placeholder="nama" name="nama" id="nama" value="<?php echo $admin['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?php echo $admin['username']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control" placeholder="Password" name="password" id="password" value="<?php echo $admin['password']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer d-flex justify-content-end">
                                        <button type="submit" class="btn btn-fill btn-primary" id="editDataFp">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            </script> Dibuat Oleh Lilis <i class="tim-icons icon-heart-2"></i>
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // Variabel global untuk menyimpan instance Cropper
        var cropper;

        const loding = document.querySelector('.loading');

        // Fungsi untuk menampilkan gambar yang dipilih dan menampilkan modal
        function previewAndUpdateProfile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#editFotoProfilePreview').attr('src', e.target.result);
                    $('#editFotoProfileModal').modal('show');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Fungsi untuk memotong gambar dan menyimpannya
        function cropImage() {
            var croppedCanvas = cropper.getCroppedCanvas({
                width: 200, // Tentukan lebar gambar yang diinginkan
                height: 200 // Tentukan tinggi gambar yang diinginkan
            });
            var croppedDataUrl = croppedCanvas.toDataURL();

            // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
            loding.style.display = 'flex';

            // Simpan data gambar ke server menggunakan AJAX
            $.ajax({
                type: 'POST',
                url: 'fp/edit_fp.php',
                data: {
                    imageBase64: croppedDataUrl
                },
                success: function(response) {

                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    // Tampilkan sweet alert dengan pesan respon
                    swal("Sukses!", response, "success").then((value) => {
                        // Setelah pengguna menekan tombol "OK" pada SweetAlert, tampilkan alert
                        if (value) {
                            location.reload();
                        }
                    });
                },
                error: function(xhr, status, error) {
                    // Tampilkan sweet alert dengan pesan error
                    swal("Error!", xhr.responseText, "error");
                }
            });

            // Sembunyikan modal pemotongan gambar
            $('#editFotoProfileModal').modal('hide');
        }

        $(document).ready(function() {
            $('#editFotoProfileModal').on('shown.bs.modal', function() {
                // Inisialisasi Cropper setelah modal ditampilkan
                var containerWidth = $('.gambar').width();
                var containerHeight = $('.gambar').height();
                cropper = new Cropper($('#editFotoProfilePreview')[0], {
                    aspectRatio: 1, // 1:1 aspect ratio
                    viewMode: 1, // Crop mode
                    minContainerWidth: containerWidth, // Set minimum container width to match image container width
                    minContainerHeight: containerHeight, // Set minimum container height to match image container height
                });
            });

            $('#btnSaveProfile').on('click', function() {
                cropImage();
            });

            $('#editFotoProfileModal').on('hidden.bs.modal', function() {
                // Hapus cropper ketika modal ditutup
                if (cropper) {
                    cropper.destroy();
                }
            });
        });

        $(document).ready(function() {
            $('#editDataFp').on('submit', function(event) {
                event.preventDefault(); // Mencegah perilaku default form submit

                // Tangkap data formulir
                var formData = $('#editDataFp').serialize();
                // Kirim data formulir ke halaman proses_data_fp.php menggunakan AJAX

                // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                loding.style.display = 'flex';

                $.ajax({
                    type: 'POST',
                    url: 'fp/proses_data_fp.php',
                    data: formData, // Kirim data formulir yang telah ditangkap
                    success: function(response) {

                        // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                        loding.style.display = 'none';

                        // Periksa apakah respons adalah 'success'
                        if (response === 'success') {
                            // Tampilkan sweet alert dengan pesan sukses
                            swal("Sukses!", "Data berhasil diperbarui", "success").then((value) => {
                                // Jika pengguna menekan tombol "OK", lakukan sesuatu
                                if (value) {
                                    location.reload(); // Muat ulang halaman
                                }
                            });
                        } else if (response === 'username_sudah_ada') {
                            // Jika username sudah ada, tampilkan pesan khusus
                            swal("Username Sudah Ada!", "Username yang Anda masukkan sudah terdaftar", "info");
                        } else {
                            // Jika respons adalah sesuatu yang tidak diharapkan, tampilkan pesan error
                            swal("Error!", response, "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan sweet alert dengan pesan error
                        swal("Error!", xhr.responseText, "error");
                    }
                });
            });
        });
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