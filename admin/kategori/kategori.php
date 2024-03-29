<?php
include "../koneksi/session.php";
include "../koneksi/koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color: #EBF3E8">
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
                                    <a class="nav-link active" href="kategori.php">Kategori</a>
                                    <a class="nav-link active" href="../berita/berita.php">Berita</a>
                                    <a class="nav-link active" href="../konfigurasi/konfigurasi.php">Konfigurasi</a>
                                    <a class="nav-link active" href="../akun/admin.php">User Admin</a>
                                    <!-- <a class="nav-link active" href="../quiz/quiz_set.php">Quiz</a> -->
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
                <h1>KATEGORI</h1>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5>Tambah Kategori</h5>
                            </div>
                            <div class="card-body">

                                <?php if (isset($_GET['error'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show mt-1 ms-1 me-1"
                                        role="alert">
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

                                        $sql = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE id_kategori = '$id'");
                                        $run = mysqli_fetch_array($sql);

                                        ?>

                                        <form action="proses.php" method="post" class="">
                                            <input type="hidden" name="id_kategori" value="<?= $run['id_kategori']?>">
                                            <div class="col-md-6">
                                                <label class="form-label">Nama Kategori</label>
                                                <input type="text" class="form-control" name="kategori" value="<?= $run['kategori']?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Alias</label>
                                                <input type="text" class="form-control" name="alias" value="<?= $run['alias']?>">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Tampilkan</label>
                                                <select class="form-select" aria-label="Default select example" name="terbit">
                                                    <option selected></option>
                                                    <option value="1" <?=$run['terbit']== 1 ? 'selected':'' ?>>Yes</option>
                                                    <option value="2" <?=$run['terbit']== 2 ? 'selected':'' ?>>No</option>
                                                </select>
                                            </div>
                                            <div class="col mt-3">
                                                <button type="submit" class="btn btn-primary" name="aksi" value="ubah">Ubah</button>
                                                <a href="kategori.php" class="btn btn-danger" name="aksi">Back</a>
                                            </div>
                                        </form>

                                    <?php
                                    }
                                } else {
                                    ?>
                                    <form action="proses.php" method="post" class="">
                                        <div class="col-md-6">
                                            <label class="form-label">Nama Kategori</label>
                                            <input type="text" class="form-control" name="kategori">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Alias</label>
                                            <input type="text" class="form-control" name="alias">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Tampilkan</label>
                                            <select class="form-select" aria-label="Default select example" name="terbit">
                                                <option selected></option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col mt-3">
                                            <button type="submit" class="btn btn-primary" name="aksi" value="add">Tambah</button>
                                            <!-- <input type="submit" class="btn btn-primary" name="tbh_kategori" value="Tambah"> -->
                                        </div>
                                    </form>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h5>List Kategori</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nama Kategori</th>
                                            <th scope="col">Alias</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    $tampil = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                                    while ($data = mysqli_fetch_array($tampil)):
                                        $id_kategori = $data['id_kategori'];
                                        $kategori = $data['kategori'];
                                        $alias = $data['alias'];
                                        ?>
                                        <tbody>
                                            <td scope="col">
                                                <?= $i++ ?>
                                            </td>
                                            <td scope="col">
                                                <?= $kategori ?>
                                            </td>
                                            <td scope="col">
                                                <?= $alias ?>
                                            </td>
                                            <td scope="col">
                                                <a href="kategori.php?aksi=edit&id=<?= $id_kategori ?>"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="proses.php?aksi=delete&id=<?= $id_kategori ?>"
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
                <p>Copyright &copy; 2023, by Maulana Sandi Samudera</p>
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