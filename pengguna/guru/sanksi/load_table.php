                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center column-fixed">Nomor</th>
                                                <th class="text-center column-fixed">Nama sanksi</th>
                                                <th class="text-center column-fixed">Edit</th>
                                                <th class="text-center column-fixed">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../../keamanan/koneksi.php';

                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                            $query = "SELECT * FROM sanksi";
                                            if (!empty($search_query)) {
                                                $query .= " WHERE sanksi LIKE '%$search_query%'";
                                            }
                                            $query .= " ORDER BY id_sanksi DESC";
                                            $result = mysqli_query($koneksi, $query);
                                            $counter = 1;

                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['sanksi'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-primary btn-sm' onclick='openEditModal(
                                                                \"" . htmlspecialchars($row['id_sanksi'], ENT_QUOTES) . "\",
                                                                \"" . htmlspecialchars($row['sanksi'], ENT_QUOTES) . "\"
                                                            )'>Edit</button>
                                                        </td>";
                                                    echo "<td class='text-center'>
                                                            <button class='btn btn-danger btn-sm' onclick='hapus(\"" . htmlspecialchars($row['id_sanksi'], ENT_QUOTES) . "\")'>Hapus</button>
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