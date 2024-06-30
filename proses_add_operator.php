<?php
// Memanggil file koneksi.php untuk melakukan koneksi ke database
require_once("koneksi.php");

// Ambil data dari formulir
$kode_opr = $_POST['kode_opr'];
$nama_opr = $_POST['nama_opr'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tgl_masuk = $_POST['tgl_masuk'];
$shift = $_POST['shift'];
$gambar = $_FILES['gambar']['name']; // Ambil nama file gambar
$tempname = $_FILES['gambar']['tmp_name']; // Ambil temporary name file yang diupload
$folder = "./image/" . $gambar; // Folder tujuan dan nama file

// Query SQL untuk memeriksa apakah kode_brg sudah ada dalam database
$check_sql = "SELECT kode_opr FROM tb_operator WHERE kode_opr = '$kode_opr'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "<script>
            alert('Kode barang sudah ada dalam database. Silakan gunakan kode yang berbeda!');
            window.location.href = 'addoperator.php';
            </script>";
} else {
    // Query SQL untuk memasukkan data ke dalam tabel tb_brg
    $insert_sql = "INSERT INTO tb_operator (kode_opr, nama_opr, tgl_lahir, jenis_kelamin, tgl_masuk, shift, gambar) 
                    VALUES ('$kode_opr', '$nama_opr', '$tgl_lahir', '$jenis_kelamin', '$tgl_masuk', '$shift', '$gambar')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "<script>
                alert('Input berhasil.');
                window.location.href = 'browseopr.php';
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
