<?php
// Koneksi ke database
require_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["kode"])) {
    // Ambil kode produk dari parameter URL
    $kode_spl = $_POST["kode"];

    // Query SQL untuk menghapus data produk berdasarkan kode produk
    $sql = "DELETE FROM tb_supplier WHERE kode_spl = '$kode_spl'";

    if ($conn->query($sql) === TRUE) {
        header("Location: browse_supplier.php"); // Redirect kembali ke halaman browse_supplier.php setelah berhasil menghapus
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="mycss/bootstrap/bootstrap.min.css">
        <script src="mycss/jquery_min/jquery.min.js"></script>
        <script src="mycss/popper_min/popper.min.js"></script>
        <script src="mycss/bootstrap_min/bootstrap.min.js"></script>
        <title>Hapus Supplier</title>
        <script>
        function confirmDelete() {
            return confirm('Anda yakin ingin menghapus data supplier ini?');
        }
        </script>
    </head>

    <body>
        <div class="container mt-5">
            <h2>Hapus Supplier</h2>
            <p>Anda yakin ingin menghapus data supplier ini?</p>
            <form action="" method="POST" onsubmit="return confirmDelete();">
                <input type="hidden" name="kode" value="<?php echo $_GET['kode']; ?>">
                <button type="submit" class="btn btn-danger">Hapus</button>
                <a href="browse_supplier.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </body>

</html>