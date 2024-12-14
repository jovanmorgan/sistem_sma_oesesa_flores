<?php
include 'koneksi.php';

function checkpenggunahType($username)
{
    global $koneksi;
    $query_admin = "SELECT * FROM admin WHERE username = '$username'";
    $query_guru = "SELECT * FROM guru WHERE username = '$username'";
    $query_kepsek = "SELECT * FROM kepsek WHERE username = '$username'";
    $query_ortu = "SELECT * FROM ortu WHERE username = '$username'";
    $query_siswa = "SELECT * FROM siswa WHERE username = '$username'";

    $result_admin = mysqli_query($koneksi, $query_admin);
    $result_guru = mysqli_query($koneksi, $query_guru);
    $result_kepsek = mysqli_query($koneksi, $query_kepsek);
    $result_ortu = mysqli_query($koneksi, $query_ortu);
    $result_siswa = mysqli_query($koneksi, $query_siswa);

    if (mysqli_num_rows($result_admin) > 0) {
        return "admin";
    } elseif (mysqli_num_rows($result_guru) > 0) {
        return "guru";
    } elseif (mysqli_num_rows($result_kepsek) > 0) {
        return "kepsek";
    } elseif (mysqli_num_rows($result_ortu) > 0) {
        return "ortu";
    } elseif (mysqli_num_rows($result_siswa) > 0) {
        return "siswa";
    } else {
        return "not_found";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi data
    if (empty($username) && empty($password)) {
        echo "tidak_ada_data";
        exit();
    }
    if (empty($username)) {
        echo "username_tidak_ada";
        exit();
    }

    if (empty($password)) {
        echo "password_tidak_ada";
        exit();
    }


    $penggunahType = checkpenggunahType($username);
    if ($penggunahType !== "not_found") {
        $query_penggunah = "SELECT * FROM $penggunahType WHERE username = '$username'";
        $result_penggunah = mysqli_query($koneksi, $query_penggunah);

        if (mysqli_num_rows($result_penggunah) > 0) {
            $row = mysqli_fetch_assoc($result_penggunah);
            $hashed_password = $row['password'];

            if ($password === $hashed_password) {

                // Process login for other penggunah types
                session_start();
                $_SESSION['username'] = $username;

                switch ($penggunahType) {
                    case "admin":
                        $_SESSION['id_admin'] = $row['id_admin'];
                        break;
                    case "guru":
                        $_SESSION['id_guru'] = $row['id_guru'];
                        $id_guru = $row['id_guru'];
                        break;
                    case "kepsek":
                        $_SESSION['id_kepsek'] = $row['id_kepsek'];
                        break;
                    case "ortu":
                        $_SESSION['id_ortu'] = $row['id_ortu'];
                        break;
                    case "siswa":
                        $_SESSION['id_siswa'] = $row['id_siswa'];
                        break;
                    default:
                        break;
                }

                // Success response
                switch ($penggunahType) {
                    case "admin":
                        echo "success:" . $username . ":" . $penggunahType . ":" . "../pengguna/admin/";
                        break;
                    case "guru":
                        echo "success:" . $username . ":" . $penggunahType . ":" . "../pengguna/guru/";
                        break;
                    case "kepsek":
                        echo "success:" . $username . ":" . $penggunahType . ":" . "../pengguna/kepsek/";
                        break;
                    case "ortu":
                        echo "success:" . $username . ":" . $penggunahType . ":" . "../pengguna/ortu/";
                        break;
                    case "siswa":
                        echo "success:" . $username . ":" . $penggunahType . ":" . "../pengguna/siswa/";
                        break;
                    default:
                        echo "success:" . $username . ":" . $penggunahType . ":" . "../berlangganan/login_pegunah";
                        break;
                }
            } else {
                echo "error_password";
            }
        } else {
            echo "error_username";
        }
    } else {
        echo "error_username";
    }
}
