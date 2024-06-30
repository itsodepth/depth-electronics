<?php
// Memanggil file koneksi.php untuk melakukan koneksi ke database
require_once("koneksi.php");

// Ambil data dari formulir
$kode_spl = $_POST['kode_spl'];
$nama_spl = $_POST['nama_spl'];
$nama_perush = $_POST['nama_perush'];
$alamat_perush = $_POST['alamat_perush'];
$pic = $_FILES['pic']['name']; // Ambil nama file gambar
$tempname = $_FILES['pic']['tmp_name']; // Ambil temporary name file yang diupload
$folder = "./image/" . $pic; // Folder tujuan dan nama file

// Query SQL untuk memeriksa apakah kode_brg sudah ada dalam database
$check_sql = "SELECT kode_spl FROM tb_supplier WHERE kode_spl = '$kode_spl'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "<script>
            alert('Kode barang sudah ada dalam database. Silakan gunakan kode yang berbeda!');
            window.location.href = 'addoperator.php';
            </script>";
} else {
    // Query SQL untuk memasukkan data ke dalam tabel tb_brg
    $insert_sql = "INSERT INTO tb_supplier (kode_spl, nama_spl, nama_perush, alamat_perush, pic) 
                    VALUES ('$kode_spl', '$nama_spl', '$nama_perush', '$alamat_perush', '$pic')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "<script>
                alert('Input berhasil.');
                window.location.href = 'browse_supplier.php';
            </script>";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }

    // Pindahkan file gambar yang diupload ke folder tujuan
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>Image uploaded successfully!</h3>";
    } else {
        echo "<h3>Failed to upload image!</h3>";
    }
}

// Tutup koneksi ke database
$conn->close();
$conn->close();