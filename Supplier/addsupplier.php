<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="mycss/bootstrap/bootstrap.min.css">
        <script src="mycss/jquery_min/jquery.min.js"></script>
        <script src="mycss/popper_min/popper.min.js"></script>
        <script src="mycss/bootstrap_min/bootstrap.min.js"></script>
        <title>Input Supplier</title>
    </head>

    <body>
        <div class="container p-5">
            <h2>Input Supplier</h2>
            <form action="proses_add_supplier.php" method="POST" enctype="multipart/form-data">
                <div class="form-group my-3">
                    <label for="kode_spl">Kode Supplier:</label>
                    <input type="text" class="form-control" id="kode_spl" name="kode_spl" required>
                </div>
                <div class="form-group my-3">
                    <label for="nama_spl">Nama Supplier:</label>
                    <input type="text" class="form-control" id="nama_spl" name="nama_spl" required>
                </div>
                <div class="form-group my-3">
                    <label for="nama_perush">Nama Perusahaan:</label>
                    <input type="text" class="form-control" id="nama_perush" name="nama_perush" required>
                </div>
                <div class="form_group my-3">
                    <label for="alamat_perush">Alamat Perusahaan:</label>
                    <input type="text" class="form-control" id="alamat_perush" name="alamat_perush" required>
                </div>
                <div class="form_group my-3">
                    <label for="pic">Gambar Perusahaan:</label>
                    <input type="file" class="form-control-file" id="pic" name="pic" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
            <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Index</a> <!-- Tombol "Kembali ke Index" -->
        </div>
    </body>

</html>