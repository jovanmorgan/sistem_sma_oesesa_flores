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
                                            include '../../../keamanan/koneksi.php';

                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                            $query = "SELECT * FROM ortu";
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