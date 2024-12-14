                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center column-fixed">Nomor</th>
                                                <th class="text-center column-fixed">Nama</th>
                                                <th class="text-center column-fixed">Username</th>
                                                <th class="text-center column-fixed">Password</th>
                                                <th class="text-center column-fixed">Edit</th>
                                                <th class="text-center column-fixed">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../../keamanan/koneksi.php';

                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                            $query = "SELECT * FROM kepsek";
                                            if (!empty($search_query)) {
                                                $query .= " WHERE nama LIKE '%$search_query%' OR username LIKE '%$search_query%' OR password LIKE '%$search_query%'";
                                            }
                                            $query .= " ORDER BY id_kepsek DESC";
                                            $result = mysqli_query($koneksi, $query);
                                            $counter = 1;

                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'><p class='button-like text-white'>" . $row['username'] . "</p></td>";
                                                    echo "<td class='text-center'><p class='button-like text-white'>" . $row['password'] . "</p></td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-primary btn-sm' onclick='openEditModal(
                                                                \"" . htmlspecialchars($row['id_kepsek'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['nama'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['username'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['password'], ENT_QUOTES) . "\"
                                                            )'>Edit</button>
                                                        </td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_kepsek'], ENT_QUOTES) . "\")'>Hapus</button>
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