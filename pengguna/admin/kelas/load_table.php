                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center column-fixed">Nomor</th>
                                                <th class="text-center column-fixed">Nama Kelas</th>
                                                <th class="text-center column-fixed">Jurusan</th>
                                                <th class="text-center column-fixed">Edit</th>
                                                <th class="text-center column-fixed">Hapus</th>
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
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-primary btn-sm' onclick='openEditModal(
                                                                \"" . htmlspecialchars($row['id_kelas'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['kelas'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['id_jurusan'], ENT_QUOTES) . "\"
                                                            )'>Edit</button>
                                                        </td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_kelas'], ENT_QUOTES) . "\")'>Hapus</button>
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