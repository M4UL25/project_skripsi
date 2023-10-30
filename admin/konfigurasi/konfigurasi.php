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
                                    <a class="nav-link active" href="../akun/admin.php">User Admin</a>
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
            <div class="d-flex justify-content-center my-3 bg-primary text-white">
                <h1>KONFIGURASI</h1>
            </div>

            <div class="d-flex">
                <div class="container">
                    <!-- <div class="row">
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
                    </div> -->

                    <div class="mt-3">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5>Tambah Konfigurasi</h5>
                            </div>
                            <div class="card-body">

                                <?php if (isset($_GET['error'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show mt-1 ms-1 me-1" role="alert">
                                        <?= $_GET['error'] ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET['scc'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show mt-1 ms-1 me-1"
                                        role="alert">
                                        <?= $_GET['scc'] ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET['dlt'])) { ?>
                                    <div class="alert alert-warning alert-dismissible fade show mt-1 ms-1 me-1"
                                        role="alert">
                                        <?= $_GET['dlt'] ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET['edt'])) { ?>
                                    <div class="alert alert-warning alert-dismissible fade show mt-1 ms-1 me-1"
                                        role="alert">
                                        <?= $_GET['edt'] ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php } ?>

                                <?php
                                if (isset($_GET['aksi'])) {
                                    if (($_GET['aksi'] == 'edit')) {
                                        $id = $_GET['id'];

                                        $sql = mysqli_query($conn, "SELECT * FROM tb_konfigurasi WHERE id_konfi = '$id'");
                                        $run = mysqli_fetch_array($sql);

                                        ?>

                                <form action="proses.php" method="post" class="row g-2">
                                    <input type="hidden" class="form-control" placeholder="Nama" name="id_konfi" value="<?= $run['id_konfi']?>">
                                    <div class="col-3">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" placeholder="Nama" name="nama_konfi" value="<?= $run['nama_konfi']?>">
                                    </div>
                                    <div class="col-2">
                                        <label>Tax</label>
                                        <input type="text" class="form-control" placeholder="Tax" name="tax" value="<?= $run['tax']?>">
                                    </div>
                                    <div class="col-4">
                                        <label>Isi</label>
                                        <input type="text" class="form-control" placeholder="Isi" name="isi_konfi" value="<?= $run['isi_konfi']?>">
                                    </div>
                                    <div class="col-3">
                                        <label>Link</label>
                                        <input type="text" class="form-control" placeholder="Link" name="link" value="<?= $run['link']?>">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary" name="aksi" value="ubah">Ubah</button>
                                        <a href="konfigurasi.php" class="btn btn-danger" name="aksi">Back</a>
                                    </div>
                                </form>

                                <?php
                                    }
                                } else {
                                ?>
                                    <form action="proses.php" method="post" class="row g-2">
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
                                        <button type="submit" class="btn btn-primary ms-1 col-1" name="aksi" value="add">Tambah</button>
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- <div class="container">
                <div class="card my-3">
                    <div class="card-header bg-primary text-white">
                        <h5>List Konfigurasi</h5>
                    </div>
                    <div class="card-body">
                        <form action="proses.php" class="row" method="post">
                            <?php
    
                            $hasil = mysqli_query($conn, "SELECT * FROM tb_konfigurasi WHERE tipe='konfigurasi'");
                            while ($run = mysqli_fetch_array($hasil)) {
                                extract($run);
                                $id_konfi = $run['id_konfi'];
                                $nama_konfi = $run['nama_konfi'];
                                $tax = $run['tax'];
                                $isi_konfi = $run['isi_konfi'];
                                $link = $run['link'];
                                ?>
                                <input type="text" class="form-control" name="nama_konfi" value="<?= $id_konfi ?>">
                                <div class="col-3 mt-2">
                                    <input type="text" class="form-control" name="nama_konfi" value="<?= $nama_konfi ?>">
                                </div>
                                <div class="col-2 mt-2">
                                    <input type="text" class="form-control" name="tax" value="<?= $tax ?>">
                                </div>
                                <div class="col-3 mt-2">
                                    <input type="text" class="form-control" name="isi_konfi" value="<?= $isi_konfi ?>">
                                </div>
                                <div class="col-3 mt-2">
                                    <input type="text" class="form-control" name="link" value="<?= $link ?>">
                                </div>
                                <div class="col-1 mt-2 text-center">
                                    <a href="proses.php?aksi=delete&id=<?= $id_konfi ?>" class="btn btn-secondary">Hapus</a>
                                </div>
                                <?php
                            }
                            ?>
                            <button type="submit" name="aksi" value="ubah" class="btn btn-primary col-1 ms-3 mt-2">Edit</button>
                        </form>
                    </div>
    
                </div>
            </div> -->
            <div class="container mt-3">
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h5>List Konfigurasi</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Konfigurasi</th>
                                            <th scope="col">Tax</th>
                                            <th scope="col">Isi</th>
                                            <th scope="col">Link</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    $tampil = mysqli_query($conn, "SELECT * FROM tb_konfigurasi ORDER BY id_konfi DESC");
                                    while ($data = mysqli_fetch_array($tampil)):
                                        $id_konfi = $data['id_konfi'];
                                        $nama_konfi = $data['nama_konfi'];
                                        $tax = $data['tax'];
                                        $isi_konfi = $data['isi_konfi'];
                                        $link = $data['link'];
                                        ?>
                                        <tbody>
                                            <td scope="col-3">
                                                <?= $nama_konfi ?>
                                            </td>
                                            <td scope="col-3">
                                                <?= $tax ?>
                                            </td>
                                            <td scope="col-4">
                                                <?= $isi_konfi ?>
                                            </td>
                                            <td scope="col-2">
                                                <?= $link ?>
                                            </td>
                                            <td scope="col">
                                                <a href="konfigurasi.php?aksi=edit&id=<?= $id_konfi ?>"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="proses.php?aksi=delete&id=<?= $id_konfi ?>"
                                                    class="btn btn-danger">Hapus</a>
                                            </td>


                                        <?php endwhile; ?>
                                </table>
                            </div>
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