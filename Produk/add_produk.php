<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="mycss/bootstrap/bootstrap.min.css">
        <script src="mycss/jquery_min/jquery.min.js"></script>
        <script src="mycss/popper_min/popper.min.js"></script>
        <script src="mycss/bootstrap_min/bootstrap.min.js"></script>
        <title>Input Data Produk</title>
    </head>

    <body>
        <div class="container p-5">
            <h2>Input Data Barang</h2>
            <form action="proses_add_produk.php" method="POST" enctype="multipart/form-data">
                <div class="form-group my-3">
                    <label for="kode_brg">Kode Barang:</label>
                    <input type="text" class="form-control" id="kode_brg" name="kode_brg" required>
                </div>
                <div class="form-group my-3">
                    <label for="nama_brg">Nama Barang:</label>
                    <input type="text" class="form-control" id="nama_brg" name="nama_brg" required>
                </div>
                <div class="form-group my-3">
                    <label for="merk_brg">Merk Barang:</label>
                    <input type="text" class="form-control" id="merk_brg" name="merk_brg" required>
                </div>
                <div class="form-group my-3">
                    <label for="harga_beli">Harga Beli:</label>
                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" required>
                </div>
                <div class="form_group my-3">
                    <label for="harga_jual">Harga Jual:</label>
                    <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
                </div>
                <div class="form_group my-3">
                    <label for="supplier">Supplier:</label>
                    <input type="text" class="form-control" id="supplier" name="supplier" required>
                </div>
                <div class="form_group my-3">
                    <label for="gambar">Gambar:</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
            <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Index</a> <!-- Tombol "Kembali ke Index" -->
        </div>
    </body>

</html>