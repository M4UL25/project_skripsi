<?php
include "../koneksi/session.php";
include "../koneksi/koneksi.php";
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
                <h2>
                    <?php echo "Selamat Datang " . $_SESSION['username'] . " "; ?>
                </h2>
                <!-- <h2>Selamat Datang di Halaman Admin</h2> -->
            </div>
            <div class="card-body bg-body-tertiary">
                <div class="mb-0">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container">
                            <div class="collapse navbar-collapse d-flex justify-content-between"
                                id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-link active" href="../index.php">Home</a>
                                    <a class="nav-link active" href="../kategori/kategori.php">Kategori</a>
                                    <a class="nav-link active" href="../berita/berita.php">Berita</a>
                                    <a class="nav-link active" href="konfigurasi.php">Konfigurasi</a>
                                    <a class="nav-link active" href="../admin/useradmin.php">User Admin</a>
                                </div>
                                <div class="out">
                                    <a class="nav-link active" href="../koneksi/logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- content menu -->
            <div class="d-flex justify-content-center my-3">
                <h1>KONFIGURASI</h1>
            </div>

            <div class="d-flex">
                <div class="container">
                    <div class="row">
                        <div class="col-7">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5>Logo</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <img src="" width="250">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="inputGroupFile04"
                                                name="logositus" aria-describedby="inputGroupFileAddon04"
                                                aria-label="Upload">
                                            <button class="btn btn-primary text-white" type="button" name="uploadlogo"
                                                id="inputGroupFileAddon04">Button</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5>Icon</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <img src="" width="50">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="inputGroupFile04"
                                                name="iconsitus" aria-describedby="inputGroupFileAddon04"
                                                aria-label="Upload">
                                            <button class="btn btn-primary text-white" type="button" name="uploadicon"
                                                id="inputGroupFileAddon04">Button</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5>Tambah Konfigurasi</h5>
                            </div>
                            <div class="card-body">
                                <form action="aksi/aksi_konpi.php" method="post" class="row g-2">
                                    <div class="col-3">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" placeholder="Nama" name="nama_konfi">
                                    </div>
                                    <div class="col-2">
                                        <label>Tax</label>
                                        <input type="text" class="form-control" placeholder="Tax" name="tax">
                                    </div>
                                    <div class="col-4">
                                        <label>Isi</label>
                                        <input type="text" class="form-control" placeholder="Isi" name="isi_konfi">
                                    </div>
                                    <div class="col-3">
                                        <label>Link</label>
                                        <input type="text" class="form-control" placeholder="Link" name="link">
                                    </div>
                                    <input type="submit" name="tbh_konfigurasi" value="Tambah"
                                        class="btn btn-primary ms-1 col-1">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card my-3">
                        <div class="card-header bg-primary text-white">
                            <h5>List Konfigurasi</h5>
                        </div>
                        <div class="card-body">
                            <form action="aksi/aksi_konpi.php" class="row">
                                <?php
                                include '../koneksi/koneksi.php';


                                $hasil = mysqli_query($conn, "SELECT * FROM tb_konfigurasi WHERE tipe='konfigurasi'");
                                while ($run = mysqli_fetch_array($hasil)) {
                                    extract($run);
                                    $nama_konfi = $run['nama_konfi'];
                                    $tax = $run['tax'];
                                    $isi_konfi = $run['isi_konfi'];
                                    $link = $run['link'];
                                    ?>
                                    <input type="hidden" class="form-control" value="<?= $id_konfi ?>" name="nama_konfi[]">
                                    <div class="col-3 mt-2">
                                        <input type="text" class="form-control" value="<?= $nama_konfi ?>"name="nama_konfi[]">
                                    </div>
                                    <div class="col-2 mt-2">
                                        <input type="text" class="form-control" value="<?= $tax ?>" name="tax[]">
                                    </div>
                                    <div class="col-3 mt-2">
                                        <input type="text" class="form-control" value="<?= $isi_konfi ?>" name="isi_konfi[]">
                                    </div>
                                    <div class="col-3 mt-2">
                                        <input type="text" class="form-control" value="<?= $link ?>" name="link[]">
                                    </div>
                                    <div class="col-1 mt-2 text-center">
                                        <a href="aksi_konpi.php?id=<?= $id_konfi ?>" class="btn btn-secondary">Hapus</a>
                                    </div>
                                    <?php
                                }
                                ?>
                                <input type="submit" name="edit_konfigurasi" value="Edit"
                                    class="btn btn-primary col-1 ms-3 mt-2">
                            </form>
                        </div>




                    </div>
                </div>
            </div>
            <!-- footer content -->
            <div class="card-footer text-body-secondary text-center">
                <p>by Maulana Sandi Samudera</p>
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