<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mycss/bootstrap/bootstrap.min.css">
    <script src="mycss/jquery_min/jquery.min.js"></script>
    <script src="mycss/popper_min/popper.min.js"></script>
    <script src="mycss/bootstrap_min/bootstrap.min.js"></script>
    <title>Browse Data Barang</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .container-fluid {
            margin-top: 56px;
            /* Menyesuaikan dengan tinggi navbar */
            flex: 1;
            /* Menggunakan semua ruang yang tersedia */
        }

        main {
            flex: 1;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <main>
            <h2 class="pb-4">Browse Data Operator</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Operator</th>
                        <th>Nama Operator</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Masuk</th>
                        <th>Shift</th>
                        <th>Wajah Operator</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Koneksi ke database
                    require_once("koneksi.php");

                    // Query SQL untuk mengambil data dari tabel t_master_prd
                    $sql = "SELECT * FROM tb_operator";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["kode_opr"] . "</td>";
                            echo "<td>" . $row["nama_opr"] . "</td>";
                            echo "<td>" . $row["tgl_lahir"] . "</td>";
                            echo "<td>" . $row["jenis_kelamin"] . "</td>";
                            echo "<td>" . $row["tgl_masuk"] . "</td>";
                            echo "<td>" . $row["shift"] . "</td>";
                            echo "<td><img src='image/" . $row['gambar'] . "' width='100' height='100'></td>";
                            echo "<td>";
                            echo "<div class='d-flex gap-2'>";
                            echo "<a href='edit_operator.php?kode=" . $row["kode_opr"] . "' class='btn btn-primary btn-sm'>Edit</a> ";
                            echo "<a href='hapus_operator.php?kode=" . $row["kode_opr"] . "' class='btn btn-danger btn-sm'>Hapus</a>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Tidak ada data produk.</td></tr>";
                    }

                    // Tutup koneksi ke database
                    $conn->close();
                    ?>
                </tbody>
            </table>
            
            <a href="addoperator.php" class="btn btn-primary">Tambah Operator</a>
            <a href="index.php" class="btn btn-secondary">Back to Index</a>
        </main>
    </div>
</body>

</html>
