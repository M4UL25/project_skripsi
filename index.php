<?php
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
            <div class="card-header">
                <h2><?php echo "Selamat Datang " . $_SESSION['username'] . " "; ?></h2>
                <!-- <h2>Selamat Datang di Halaman Admin</h2> -->
            </div>
            <div class="card-body bg-body-tertiary">
                <div class="mb-5">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container">
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-link active" href="./">Home</a>
                                    <a class="nav-link active" href="#">Kategori</a>
                                    <a class="nav-link active" href="#">Berita</a>
                                    <a class="nav-link active" href="#">Konfigurasi</a>
                                    <a class="nav-link active" href="?mod=useradmin">User Admin</a>

                                    <a class="nav-link active" href="koneksi/logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div class="container">
                        content
                        <?php
                        if (isset($mod)) {
                            $mod = $_GET['mod'];

                            switch ($mod) {
                                case 'useradmin':
                                    include "admin/useradmin.php";
                                    break;
                                default:
                                    echo "Selamat Datang " . $_SESSION['username'] . " ";
                                    break;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="card-footer text-body-secondary">

            </div>
        </div>
    </div>


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