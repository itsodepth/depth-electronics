<!-- index.php -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="mycss/bootstrap/bootstrap.min.css">
        <script src="mycss/jquery_min/jquery.min.js"></script>
        <script src="mycss/popper_min/popper.min.js"></script>
        <script src="mycss/bootstrap_min/bootstrap.min.js"></script>
        <title>Depth Electronics</title>
        <style>
        body {
            padding-top: 56px;
            /* Menyesuaikan dengan tinggi navbar */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .container-fluid {
            margin-top: 56px;
            /* Menyesuaikan dengan tinggi navbar */
            flex: 1;
            /* Menggunakan semua ruang yang tersedia */
        }

        .main-content {
            padding: 20px;
        }

        footer {
            padding: 10px;
            background-color: #f8f9fa;
            /* Warna latar belakang yang sesuai */
            text-align: center;
        }
        </style>
        <script>
        $(document).ready(function() {
            // Fungsi untuk memuat konten dinamis menggunakan AJAX
            function loadContent(url) {
                $.get(url, function(data) {
                    // Menyematkan konten ke dalam elemen dengan id "mainContent"
                    $("#mainContent").html(data);
                });
            }

            // Mengatur konten default pada halaman pertama
            loadContent("home.php");

            // Mengatur fungsi klik untuk setiap menu
            $("#homeBtn").click(function() {
                e.preventDefault();
                loadContent("home.php");
            });

            $("#addProdukBtn").click(function() {
                e.preventDefault();
                loadContent("add_produk.php");
            });

            $("#browseProdukBtn").click(function() {
                e.preventDefault();
                loadContent("browseproduk.php");
            });

            $("#addOperatorBtn").click(function() {
                e.preventDefault();
                loadContent("addoperator.php");
            });

            $("#browseOperatorBtn").click(function() {
                e.preventDefault();
                loadContent("browseopr.php");
            });

            $("#addSupplierBtn").click(function() {
                e.preventDefault();
                loadContent("addsupplier.php");
            });

            $("#aboutBtn").click(function() {
                e.preventDefault();
                loadContent("about.php");
            });
        });
        </script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Depth Electronics</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a id="homeBtn" class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="masterProdukDropdown" role="button"
                            data-toggle="dropdown" aria-expanded="false">
                            Alat-alat
                        </a>
                        <div class="dropdown-menu" aria-labelledby="masterProdukDropdown">
                            <a class="dropdown-item" id="addProdukBtn" href="add_produk.php">Tambah Barang</a>
                            <a class="dropdown-item" id="browseProdukBtn" href="browseproduk.php">Browse Barang</a>
                            <a class="dropdown-item" id="addOperatorBtn" href="addoperator.php">Tambah Operator</a>
                            <a class="dropdown-item" id="browseOperatorBtn" href="browseopr.php">Browse Operator</a>
                            <a class="dropdown-item" id="addSupplierBtn" href="addsupplier.php">Tambah Supplier</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addoperator.php" id="masterOperatorDropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            Transaksi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="aboutBtn" class="nav-link" href="#">Tentang Website</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="main-content text-center" id="mainContent">
                <!-- Konten utama akan diisikan setelah menu diklik -->
                <h2>Selamat Datang di Depth Electronics</h2>
                <p>Ini adalah halaman utama. Silakan pilih menu di atas untuk melanjutkan.</p>
            </div>
        </div>

        <footer class="bg-dark text-light p-3">
            <p class="my-auto">Diedit oleh Muh Devano Alfarizy</p>
        </footer>
    </body>

</html>