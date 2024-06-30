<?php
// Memanggil file koneksi.php untuk melakukan koneksi ke database
require_once("koneksi.php");

// Ambil data dari formulir
$kode_brg = $_POST['kode_brg'];
$nama_brg = $_POST['nama_brg'];
$merk_brg = $_POST['merk_brg'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$supplier = $_POST['supplier'];
$gambar = $_FILES['gambar']['name']; // Ambil nama file gambar
$tempname = $_FILES['gambar']['tmp_name']; // Ambil temporary name file yang diupload
$folder = "./image/" . $gambar; // Folder tujuan dan nama file

// Query SQL untuk memeriksa apakah kode_brg sudah ada dalam database
$check_sql = "SELECT kode_brg FROM tb_brg WHERE kode_brg = '$kode_brg'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "<script>
            alert('Kode barang sudah ada dalam database. Silakan gunakan kode yang berbeda!');
            window.location.href = 'add_produk.php';
            </script>";
} else {
    // Query SQL untuk memasukkan data ke dalam tabel tb_brg
    $insert_sql = "INSERT INTO tb_brg (kode_brg, nama_brg, merk_brg, harga_beli, harga_jual, supplier, gambar) 
                    VALUES ('$kode_brg', '$nama_brg', '$merk_brg', '$harga_beli', '$harga_jual', '$supplier', '$gambar')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "<script>
                alert('Input berhasil.');
                window.location.href = 'index.php';
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