<?php
include '../koneksi/koneksi.php';
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
                                <div class="alert alert-warning alert-dismissible fade show mt-1 ms-1 me-1" role="alert">
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

                            <form action="register/aksi_admin.php" method="post">
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
                                                placeholder="Masukkan Username" value="">
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
                                    <input type="submit" class="btn btn-primary" name="btn_daftar" value="Register"
                                        placeholder="Simpan">
                                    <!-- <a href="#" class="btn btn-primary">Register</a> -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer bg-primary"> <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>List User</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 mx-auto">
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="tcari" class="form-control"
                                        placeholder="Masukkan kata kunci!">
                                    <button class="btn btn-primary" name="bcari" type="submit">Cari</button>
                                    <button class="btn btn-danger" name="breset" type="submit">Reset</button>
                                </div>
                            </form>
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
                                        <a href="aksi/view.php?id=<?= $id_admin ?>" class="btn btn-primary">Edit</a>
                                        <a href="aksi/delete.php?id=<?= $id_admin ?>" class="btn btn-danger">Delete</a>
                                        <!-- <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Delete
                                        </button> -->
                                    </td>
                                    <!-- Button trigger modal -->


                                    <?php endwhile; ?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure, delete this account?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="" class="btn btn-secondary" data-bs-dismiss="modal">No</a>
                                                    <a href="delete.php?id=<?= $id_admin ?>" class="btn btn-primary">Yes</a>
                                                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button> -->
                                                    <button type="button" class="btn btn-primary">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </table>
                    </div>
                    <div class="modal">

                    </div>
                    <div class="card-footer bg-primary">
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>




    </fieldset>


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