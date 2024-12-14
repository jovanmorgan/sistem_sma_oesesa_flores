                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center column-fixed">Nomor</th>
                                                <th class="text-center column-fixed">Nama pelanggaran</th>
                                                <th class="text-center column-fixed">Tanggal</th>
                                                <th class="text-center column-fixed">Nama Siswa</th>
                                                <th class="text-center column-fixed">Sanksi</th>
                                                <th class="text-center column-fixed">Edit</th>
                                                <th class="text-center column-fixed">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../../keamanan/koneksi.php';

                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                            $query = "SELECT pelanggaran.*, siswa.nama AS nama_siswa, sanksi.sanksi AS sanksi, guru.nama AS nama_guru
                                            FROM pelanggaran
                                            LEFT JOIN siswa ON pelanggaran.id_siswa = siswa.id_siswa
                                            LEFT JOIN sanksi ON pelanggaran.id_sanksi = sanksi.id_sanksi
                                            LEFT JOIN guru ON pelanggaran.id_guru = guru.id_guru";
                                            if (!empty($search_query)) {
                                                $query .= " WHERE nama_pelanggaran LIKE '%$search_query%'";
                                            }
                                            $query .= " ORDER BY id_pelanggaran DESC";
                                            $result = mysqli_query($koneksi, $query);
                                            $counter = 1;

                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $tanggal_input = $row['tanggal'];
                                                    $tanggal_input_data = date('Y-m-d', strtotime($tanggal_input));
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama_pelanggaran'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tanggal'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama_siswa'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['sanksi'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-primary btn-sm' onclick='openEditModal(
                                                                \"" . htmlspecialchars($row['id_pelanggaran'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['nama_pelanggaran'], ENT_QUOTES) . "\",
                                                                \"" . $tanggal_input_data . "\",
                                                                \"" . htmlspecialchars($row['id_siswa'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['id_sanksi'], ENT_QUOTES) . "\"
                                                            )'>Edit</button>
                                                        </td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_pelanggaran'], ENT_QUOTES) . "\")'>Hapus</button>
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