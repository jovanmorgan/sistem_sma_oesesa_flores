<?php
session_start();

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['id_admin'])) {
    // Pengguna belum masuk, arahkan kembali ke halaman masuk.php
    header("Location: ../../../berlangganan/login_pegunah");
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
    <link rel="icon" type="image/png" href="../../../images/logo.png">
    <title>
        DATA KELAS
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../../../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../../assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">
    <style>
        /* Style scrollbar */
        .table-responsive::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }

        .button-like {
            display: inline-block;
            padding: 5px 10px;
            background-color: #4e73df;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid py-4" translate="no">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h3 class="text-center">Data Kelas</h3>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 p-2">
                        <div class="table-responsive p-0">
                            <table id="example" class="table align-items-center mb-0 display nowrap">
                                <thead class=" text-primary">
                                    <tr>
                                        <th class="text-center column-fixed">Nomor</th>
                                        <th class="text-center column-fixed">Nama Kelas</th>
                                        <th class="text-center column-fixed">Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../../../keamanan/koneksi.php';

                                    $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                    $query = "SELECT kelas.*, jurusan.jurusan AS nama_jurusan
                                            FROM kelas
                                            LEFT JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan";
                                    if (!empty($search_query)) {
                                        $query .= " WHERE kelas.kelas LIKE '%$search_query%' OR kelas.username LIKE '%$search_query%' OR kelas.password LIKE '%$search_query%' OR jurusan.jurusan LIKE '%$search_query%'";
                                    }
                                    $query .= " ORDER BY id_kelas DESC";
                                    $result = mysqli_query($koneksi, $query);
                                    $counter = 1;

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                            echo "<td class='text-center'>" . htmlspecialchars($row['kelas'], ENT_QUOTES) . "</td>";
                                            echo "<td class='text-center'>" . htmlspecialchars($row['nama_jurusan'], ENT_QUOTES) . "</td>";
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

        <!-- Tautan ke file jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <!-- Tautan ke file JavaScript DataTables -->
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
        <!-- Tautan ke file JavaScript untuk ekspor -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
        <script>
            new DataTable('#example', {
                layout: {
                    topStart: {
                        buttons: [{
                            extend: 'pdfHtml5',
                            text: 'PDF A3',
                            customize: function(doc) {
                                // Mengatur ukuran kertas PDF menjadi A3
                                doc.pageSize = 'A3';
                                // Menyesuaikan warna latar belakang header
                                doc.content[1].table.headerRows = 1;
                                doc.content[1].table.body[0].forEach(function(col) {
                                    col.fillColor = '#cccccc'; // Warna abu-abu
                                });

                            }
                        }, {
                            extend: 'pdfHtml5',
                            text: 'PDF A4',
                            customize: function(doc) {
                                // Mengatur ukuran kertas PDF menjadi A3
                                doc.pageSize = 'A4';
                                // Menyesuaikan warna latar belakang header
                                doc.content[1].table.headerRows = 1;
                                doc.content[1].table.body[0].forEach(function(col) {
                                    col.fillColor = '#cccccc'; // Warna abu-abu
                                });
                            }
                        }, 'copy', 'csv', 'excel', 'print']
                    }
                }
            });
        </script>

        <!--   Core JS Files   -->
        <script src="../../../assets/js/core/jquery.min.js"></script>
        <script src="../../../assets/js/core/popper.min.js"></script>
        <script src="../../../assets/js/core/bootstrap.min.js"></script>
        <script src="../../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Place this tag in your head or just before your close body tag. -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chart JS -->
        <script src="../../../assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="../../../assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../../../assets/js/black-dashboard.min.js?v=1.0.0"></script>
        <!-- Black Dashboard DEMO methods, don't include it in your project! -->
        <script src="../../../assets/demo/demo.js"></script>
        <script>
            $(document).ready(function() {
                $().ready(function() {
                    $sidebar = $('.sidebar');
                    $navbar = $('.navbar');
                    $main_panel = $('.main-panel');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');
                    sidebar_mini_active = true;
                    white_color = false;

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



                    $('.fixed-plugin a').click(function(event) {
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .background-color span').click(function() {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data', new_color);
                        }

                        if ($main_panel.length != 0) {
                            $main_panel.attr('data', new_color);
                        }

                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data', new_color);
                        }
                    });

                    $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            sidebar_mini_active = false;
                            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                        } else {
                            $('body').addClass('sidebar-mini');
                            sidebar_mini_active = true;
                            blackDashboard.showSidebarMessage('Sidebar mini activated...');
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);
                    });

                    $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (white_color == true) {

                            $('body').addClass('change-background');
                            setTimeout(function() {
                                $('body').removeClass('change-background');
                                $('body').removeClass('white-content');
                            }, 900);
                            white_color = false;
                        } else {

                            $('body').addClass('change-background');
                            setTimeout(function() {
                                $('body').removeClass('change-background');
                                $('body').addClass('white-content');
                            }, 900);

                            white_color = true;
                        }


                    });

                    $('.light-badge').click(function() {
                        $('body').addClass('white-content');
                    });

                    $('.dark-badge').click(function() {
                        $('body').removeClass('white-content');
                    });
                });
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