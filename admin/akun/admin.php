<?php
// koneksi database & session
include '../koneksi/session.php';
include '../koneksi/koneksi.php';
include 'proses.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color: #F6F4EB">
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
                                    <a class="nav-link active" href="../index.php">Home</a>
                                    <a class="nav-link active" href="../kategori/kategori.php">Kategori</a>
                                    <a class="nav-link active" href="../berita/berita.php">Berita</a>
                                    <a class="nav-link active" href="../konfigurasi/konfigurasi.php">Konfigurasi</a>
                                    <a class="nav-link active" href="admin.php">User Admin</a>
                                    <a class="nav-link active" href="../quiz/quiz_set.php">Quiz</a>
                                </div>
                                <div class="out">
                                    <a class="nav-link active" href="../koneksi/logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3 bg-primary text-white">
                <h1>USER ADMIN</h1>
            </div>

            <!-- content menu -->
            <!-- form isi data admin -->
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4>Tambah User Admin</h4>
                            </div>
                            <div class="card-body">
                                <div class="isian">
        
                                    <?php if (isset($_GET['error'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show mt-1 ms-1 me-1" role="alert">
                                            <?= $_GET['error'] ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['scc'])) { ?>
                                        <div class="alert alert-success alert-dismissible fade show mt-1 ms-1 me-1" role="alert">
                                            <?= $_GET['scc'] ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['dlt'])) { ?>
                                        <div class="alert alert-warning alert-dismissible fade show mt-1 ms-1 me-1" role="alert">
                                            <?= $_GET['dlt'] ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['edt'])) { ?>
                                        <div class="alert alert-warning alert-dismissible fade show mt-1 ms-1 me-1" role="alert">
                                            <?= $_GET['edt'] ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php 
                                    if(isset($_GET['aksi'])) {
                                        if (($_GET['aksi'] == 'edit')){
                                            $id = $_GET['id'];

                                            $sql  = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '$id'");
                                            $run = mysqli_fetch_array($sql);

                                    ?>
                                            <form action="proses.php" method="post">
                                                <input type="hidden" name="id_admin" value="<?= $run['id_admin']?>">
                                                <div class="tambah mt-2">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="nama_admin"
                                                                placeholder="Masukkan Nama" value="<?= $run['nama_admin']?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tambah mt-2">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Username</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="username"
                                                                placeholder="Masukkan Username" value="<?= $run['username']?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tambah mt-2">
                                                    <div class="mb-3 row">
                                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" name="password"
                                                                placeholder="Masukkan Password" value="<?= $run['password']?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tambah mt-2">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">No HP</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="no_hp_admin"
                                                                placeholder="Masukkan No HP" value="<?= $run['no_hp_admin']?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tambah mt-2">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="email_admin"
                                                                placeholder="Masukkan Email" value="<?= $run['email_admin']?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12" align="right">
                                                    <button type="submit" class="btn btn-primary" name="aksi" value="ubah">Ubah</button>                                        
                                                    <a href="admin.php" class="btn btn-danger" name="aksi">Back</a>                                        
                                                </div>
                                
                                            </form>
                                    <?php
                                        } 
                                    } else { 
                                    ?>
                                        <form action="proses.php" method="post">
                                                <!-- <input type="text" name="id_admin" value=""> -->
                                                <div class="tambah mt-2">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="nama_admin"
                                                                placeholder="Masukkan Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tambah mt-2">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Username</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="username"
                                                                placeholder="Masukkan Username">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tambah mt-2">
                                                    <div class="mb-3 row">
                                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" name="password"
                                                                placeholder="Masukkan Password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tambah mt-2">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">No HP</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="no_hp_admin"
                                                                placeholder="Masukkan No HP">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tambah mt-2">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="email_admin"
                                                                placeholder="Masukkan Email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12" align="right">
                                                    <button type="submit" class="btn btn-primary" name="aksi" value="add">Tambah</button>                                        
                                                </div>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="card-footer bg-primary"> <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- view database admin -->
            <div class="container mt-3">
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h4>List User</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-6 mx-auto">
                                    <!-- <form action="" method="post">
                                        <div class="input-group mb-3">
                                            <input type="text" name="tcari" class="form-control"
                                                placeholder="Masukkan kata kunci!">
                                            <button class="btn btn-primary" name="bcari" type="submit">Cari</button>
                                            <button class="btn btn-danger" name="breset" type="submit">Reset</button>
                                        </div>
                                    </form> -->
                                </div>
        
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">No HP</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    $tampil = mysqli_query($conn, "SELECT * FROM tb_admin ORDER BY id_admin DESC");
                                    while ($data = mysqli_fetch_array($tampil)):
                                        $id_admin = $data['id_admin'];
                                        $nama_admin = $data['nama_admin'];
                                        $username = $data['username'];
                                        $no_hp_admin = $data['no_hp_admin'];
                                        $email_admin = $data['email_admin'];
                                        ?>
                                        <tbody>
                                            <td scope="col">
                                                <?= $i++ ?>
                                            </td>
                                            <td scope="col">
                                                <?= $nama_admin ?>
                                            </td>
                                            <td scope="col">
                                                <?= $username ?>
                                            </td>
                                            <td scope="col">
                                                <?= $no_hp_admin ?>
                                            </td>
                                            <td scope="col">
                                                <?= $email_admin ?>
                                            </td>
                                            <td scope="col">
                                                <a href="admin.php?aksi=edit&id=<?= $id_admin ?>" class="btn btn-primary">Edit</a>
                                                <a href="proses.php?aksi=delete&id=<?= $id_admin ?>" class="btn btn-danger">Hapus</a>
                                            </td>
        
        
                                        <?php endwhile; ?>
                                </table>
                            </div>
                            <div class="card-footer bg-primary">
                                <!--  -->
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

    <!-- script bootstrap -->
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