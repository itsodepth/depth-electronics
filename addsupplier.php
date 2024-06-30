<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="mycss/bootstrap/bootstrap.min.css">
        <script src="mycss/jquery_min/jquery.min.js"></script>
        <script src="mycss/popper_min/popper.min.js"></script>
        <script src="mycss/bootstrap_min/bootstrap.min.js"></script>
        <title>Input Operator</title>
    </head>

    <body>
        <div class="container p-5">
            <h2>Input Operator</h2>
            <form action="proses_add_operator.php" method="POST" enctype="multipart/form-data">
                <div class="form-group my-3">
                    <label for="kode_opr">Kode Operator:</label>
                    <input type="text" class="form-control" id="kode_opr" name="kode_opr" required>
                </div>
                <div class="form-group my-3">
                    <label for="nama_opr">Nama Operator:</label>
                    <input type="text" class="form-control" id="nama_opr" name="nama_opr" required>
                </div>
                <div class="form-group my-3">
                    <label for="tgl_lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                </div>
                <div class="form_group my-3">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                </div>
                <div class="form_group my-3">
                    <label for="tgl_masuk">Tanggal Masuk:</label>
                    <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" required>
                </div>
                <div class="form_group my-3">
                    <label for="shfft">Shift:</label>
                    <input type="text" class="form-control" id="shift" name="shift" required>
                </div>
                <div class="form_group my-3">
                    <label for="gambar">Wajah Operator:</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
            <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Index</a> <!-- Tombol "Kembali ke Index" -->
        </div>
    </body>

</html>