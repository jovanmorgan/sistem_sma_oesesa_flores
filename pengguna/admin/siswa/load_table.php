                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center column-fixed">Nomor</th>
                                                <th class="text-center column-fixed">Nama</th>
                                                <th class="text-center column-fixed">Username</th>
                                                <th class="text-center column-fixed">Password</th>
                                                <th class="text-center column-fixed">NIP</th>
                                                <th class="text-center column-fixed">Kelas</th>
                                                <th class="text-center column-fixed">Jurusan</th>
                                                <th class="text-center column-fixed">Jenis Kelamin</th>
                                                <th class="text-center column-wide">Tanggal Lahir</th>
                                                <th class="text-center column-fixed">Agama</th>
                                                <th class="text-center column-fixed">Alamat</th>
                                                <th class="text-center column-fixed">Edit</th>
                                                <th class="text-center column-fixed">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../../keamanan/koneksi.php';

                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                            $query = "SELECT * FROM siswa";
                                            $query = "SELECT siswa.*, kelas.kelas AS nama_kelas, kelas.id_jurusan AS id_jurusan, jurusan.jurusan AS nama_jurusan
                                            FROM siswa
                                            LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
                                            LEFT JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan";
                                            if (!empty($search_query)) {
                                                $query .= " WHERE siswa.nama LIKE '%$search_query%' OR siswa.username LIKE '%$search_query%' OR siswa.password LIKE '%$search_query%' OR siswa.nis LIKE '%$search_query%' OR siswa.jk LIKE '%$search_query%' OR siswa.tgl_lahir LIKE '%$search_query%' OR siswa.agama LIKE '%$search_query%' OR siswa.alamat LIKE '%$search_query%' OR kelas.kelas LIKE '%$search_query%' OR jurusan.jurusan LIKE '%$search_query%'";
                                            }
                                            $query .= " ORDER BY id_siswa DESC";
                                            $result = mysqli_query($koneksi, $query);
                                            $counter = 1;

                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $alamat_sambung = str_replace(array("\r", "\n"), '', nl2br($row['alamat']));
                                                    $tgl_lahir_input = $row['tgl_lahir'];
                                                    $tgl_lahir_input_data = date('Y-m-d', strtotime($tgl_lahir_input));
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'><p class='button-like text-white'>" . $row['username'] . "</p></td>";
                                                    echo "<td class='text-center'><p class='button-like text-white'>" . $row['password'] . "</p></td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nis'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama_kelas'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama_jurusan'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['jk'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tgl_lahir'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['agama'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . $alamat_sambung . "</td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-primary btn-sm' onclick='openEditModal(
                                                                \"" . htmlspecialchars($row['id_siswa'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['nama'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['username'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['password'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['nis'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['id_kelas'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['jk'], ENT_QUOTES) . "\",
                                                                \"" . $tgl_lahir_input_data . "\",
                                                                \"" . htmlspecialchars($row['agama'], ENT_QUOTES) . "\",
                                                                \"" . $alamat_sambung . "\"
                                                            )'>Edit</button>
                                                        </td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_siswa'], ENT_QUOTES) . "\")'>Hapus</button>
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