<?php
// Koneksi ke database
require_once("koneksi.php");

// Inisialisasi variabel
$kode_opr = "";
$nama_opr = "";
$tgl_lahir = "";
$jenis_kelamin = "";
$tgl_masuk = "";
$shift = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["kode"])) {
    $kode_opr = $_GET["kode"];
    $sql = "SELECT kode_opr, nama_opr, tgl_lahir, jenis_kelamin, tgl_masuk, shift FROM tb_operator WHERE kode_opr = '$kode_opr'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $kode_opr = $row["kode_opr"];
        $nama_opr = $row["nama_opr"];
        $tgl_lahir = $row["tgl_lahir"];
        $jenis_kelamin = $row["jenis_kelamin"];
        $tgl_masuk = $row["tgl_masuk"];
        $shift = $row["shift"];
    } else {
        echo "Operator tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_opr = $_POST['kode_opr'];
    $nama_opr = $_POST['nama_opr'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $shift = $_POST['shift'];

    $sql = "UPDATE tb_operator SET nama_opr = '$nama_opr', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', tgl_masuk = '$tgl_masuk', shift = '$shift' WHERE kode_opr = '$kode_opr'";
    if ($conn->query($sql) === TRUE) {
        header("Location: browseopr.php");
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
    <title>Edit Produk</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Produk</h2>
        <form action="" method="POST">
            <input type="hidden" name="kode_opr" value="<?php echo $kode_opr; ?>">
            <div class="form-group">
                <label for="nama_opr">Nama Operator:</label>
                <input type="text" class="form-control" id="nama_opr" name="nama_opr" value="<?php echo $nama_opr; ?>" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <input type="text" step="0.01" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>" required>
            </div>
            <div class="form-group">
                <label for="tgl_masuk">Tanggal Masuk:</label>
                <input type="date" step="0.01" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?php echo $tgl_masuk; ?>" required>
            </div>
            <div class="form-group">
                <label for="shift">Supplier:</label>
                <input type="text" class="form-control" id="shift" name="shift" value="<?php echo $shift; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="browseopr.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>