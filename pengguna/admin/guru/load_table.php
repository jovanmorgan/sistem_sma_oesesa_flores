                                    <table class="table tablesorter " id="dataTable">
                                    <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center">Nomor</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Username</th>
                                                <th class="text-center">Password</th>
                                                <th class="text-center">NIP</th>
                                                <th class="text-center">Jenis Kelamin</th>
                                                <th class="text-center">Tempat Tanggal Lahir</th>
                                                <th class="text-center">Jabatan</th>
                                                <th class="text-center">Agama</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">Nomor Hp</th>
                                                <th class="text-center">Edit</th>
                                                <th class="text-center">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../../keamanan/koneksi.php';

                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                            $query = "SELECT * FROM guru";
                                            if (!empty($search_query)) {
                                                $query .= " WHERE nama LIKE '%$search_query%' OR username LIKE '%$search_query%' OR password LIKE '%$search_query%'";
                                            }
                                            $query .= " ORDER BY id_guru DESC";
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
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nip'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['jk'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tempat_lahir'], ENT_QUOTES) . "/" . htmlspecialchars($row['tgl_lahir'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['jabatan'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['agama'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . $alamat_sambung . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['no_hp'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-primary btn-sm' onclick='openEditModal(
                                                                \"" . htmlspecialchars($row['id_guru'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['nama'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['username'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['password'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['nip'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['jk'], ENT_QUOTES) . "\",
                                                                \"" . $tgl_lahir_input_data . "\",
                                                                \"" . htmlspecialchars($row['tempat_lahir'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['jabatan'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['agama'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['alamat'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['no_hp'], ENT_QUOTES) . "\"
                                                            )'>Edit</button>
                                                        </td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_guru'], ENT_QUOTES) . "\")'>Hapus</button>
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