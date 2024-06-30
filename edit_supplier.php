<?php
// Koneksi ke database
require_once("koneksi.php");

// Inisialisasi variabel
$kode_spl = "";
$nama_spl = "";
$nama_perush = "";
$alamat_perush = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["kode"])) {
    $kode_opr = $_GET["kode"];
    $sql = "SELECT kode_spl, nama_spl, nama_perush, alamat_perush FROM tb_supplier WHERE kode_spl = '$kode_spl'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $kode_spl = $row["kode_spl"];
        $nama_spl = $row["nama_spl"];
        $nama_perush = $row["nama_perush"];
        $alamat_perush = $row["alamat_perush"];
    } else {
        echo "Supplier tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_spl = $_POST['kode_spl'];
    $nama_spl = $_POST['nama_spl'];
    $nama_perush = $_POST['nama_perush'];
    $alamat_perush = $_POST['alamat_perush'];

    $sql = "UPDATE tb_supplier SET nama_spl = '$nama_spl', nama_perush = '$nama_perush', alamat_perush = '$alamat_perush' WHERE kode_spl = '$kode_spl'";
    if ($conn->query($sql) === TRUE) {
        header("Location: browse_supplier.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Edit Data Supplier</title>
    </head>

    <body>
        <div class="container mt-5">
            <h2>Edit Data Supplier</h2>
            <form action="" method="POST">
                <input type="hidden" name="kode_spl" value="<?php echo $kode_spl; ?>">
                <div class="form-group">
                    <label for="nama_spl">Nama Supplier:</label>
                    <input type="text" class="form-control" id="nama_spl" name="nama_spl"
                        value="<?php echo $nama_spl; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama_perush">Nama Perusahaan:</label>
                    <input type="text" class="form-control" id="nama_perush" name="nama_perush"
                        value="<?php echo $nama_perush; ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat_perush">Nama Perusahaan:</label>
                    <input type="text" class="form-control" id="alamat_perush" name="alamat_perush"
                        value="<?php echo $alamat_perush; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="browse_supplier.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </body>

</html>