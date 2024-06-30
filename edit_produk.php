<?php
// Koneksi ke database
require_once("koneksi.php");

// Inisialisasi variabel
$kode_brg = "";
$nama_brg = "";
$merk_brg = "";
$harga_beli = "";
$harga_jual = "";
$supplier = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["kode"])) {
    // Ambil kode produk dari parameter URL
    $kode_brg = $_GET["kode"];

    // Query SQL untuk mengambil data produk berdasarkan kode produk
    $sql = "SELECT kode_brg, nama_brg, merk_brg, harga_beli, harga_jual, supplier FROM tb_brg WHERE kode_brg = '$kode_brg'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $kode_brg = $row["kode_brg"];
        $nama_brg = $row["nama_brg"];
        $merk_brg = $row["merk_brg"];
        $harga_beli = $row["harga_beli"];
        $harga_jual = $row["harga_jual"];
        $supplier = $row["supplier"];
    } else {
        echo "Produk tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $kode_brg = $_POST['kode_brg'];
    $nama_brg = $_POST['nama_brg'];
    $merk_brg = $_POST['merk_brg'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $supplier = $_POST['supplier'];

    // Query SQL untuk melakukan pembaruan data produk
    $sql = "UPDATE tb_brg SET nama_brg = '$nama_brg', merk_brg = '$merk_brg', harga_beli = '$harga_beli', harga_jual = '$harga_jual', supplier = '$supplier' WHERE kode_brg = '$kode_brg'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect kembali ke halaman index.php setelah berhasil mengedit
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Edit Produk</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Produk</h2>
        <form action="" method="POST">
            <input type="hidden" name="kode_brg" value="<?php echo $kode_brg; ?>">
            <div class="form-group">
                <label for="nama_brg">Nama Barang:</label>
                <input type="text" class="form-control" id="nama_brg" name="nama_brg" value="<?php echo $nama_brg; ?>" required>
            </div>
            <div class="form-group">
                <label for="merk_brg">Merk Barang:</label>
                <input type="text" class="form-control" id="merk_brg" name="merk_brg" value="<?php echo $merk_brg; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga_beli">Harga Beli:</label>
                <input type="number" step="0.01" class="form-control" id="harga_beli" name="harga_beli" value="<?php echo $harga_beli; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga_jual">Harga Jual:</label>
                <input type="number" step="0.01" class="form-control" id="harga_jual" name="harga_jual" value="<?php echo $harga_jual; ?>" required>
            </div>
            <div class="form-group">
                <label for="supplier">Supplier:</label>
                <input type="text" class="form-control" id="supplier" name="supplier" value="<?php echo $supplier; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="browseproduk.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>
