<?php
// koneksi database & session
include "koneksi/session.php";
include "koneksi/koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card mt-3">

            <!-- session untuk admin -->
            <div class="card-header">
                <h2>
                    <?php echo "Selamat Datang " . $_SESSION['username'] . " "; ?>
                </h2>
                <!-- <h2>Selamat Datang di Halaman Admin</h2> -->
            </div>

            <!-- navbar menu admin -->
            <div class="card-body bg-body-tertiary">
                <div class="mb-0">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container">
                            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-link active" href="index.php">Home</a>
                                    <a class="nav-link active" href="kategori.php">Kategori</a>
                                    <a class="nav-link active" href="berita.php">Berita</a>
                                    <a class="nav-link active" href="konfigurasi.php">Konfigurasi</a>
                                    <a class="nav-link active" href="admin/useradmin.php">User Admin</a>
                                </div>
                                <div class="out">
                                    <a class="nav-link active" href="koneksi/logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- content menu -->
            <div class="d-flex justify-content-center">
                <h1>INI HALAMAN HOME ADMIN</h1>
            </div>
            <div class="card-footer text-body-secondary">

            </div>
        </div>
    </div>




    <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

</body>

</html>