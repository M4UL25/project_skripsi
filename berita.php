<?php
include 'admin/koneksi/koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Poppins:wght@100;200;300;400;500;600;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
        <div class="container py-3">
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                <img src="src/img/de_logo.png" width="170" alt="">
                <div class="row">
                    <div class="col navbar-nav">
                        <a class="nav-link" aria-current="page" href="index.php">
                            <h5>Edukasi</h5>
                        </a>
                    </div>
                    <div class="col navbar-nav">
                        <a class="nav-link" aria-current="page" href="berita.php">
                            <h5>Berita</h5>
                        </a>
                    </div>
                    <div class="col navbar-nav">
                        <a class="nav-link" aria-current="page" href="quiz.php">
                            <h5>Kuis</h5>
                        </a>
                    </div>
                </div>
                <form class="d-flex" method="GET">
                    <input type="text" class="form-control me-2 rounded-pill" name="key" placeholder="Cari....">
                    <button class="btn btn-outline-success rounded-pill" name="open" value="cari"
                        type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row bg-primary py-2">
            <div class="col">
                <a href="berita.php" class="text-white" style="text-decoration:none; text-transform:capitalize">Home</a>
            </div>
            <?php
            $menu = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE terbit = '1' ORDER BY id_kategori ASC");
            while ($row = mysqli_fetch_array($menu)):
                // $id_kategori = $row['id_kategori'];
                $kategori = $row['kategori'];
                $id = $row['id_kategori'];
                ?>
                <div class="col-sm-1 d-flex justify-content-center">
                    <a href="kategori-berita.php?id=<?= $id ?>" class="text-white"
                        style="text-decoration:none; text-transform:capitalize">
                        <?= $kategori ?>
                    </a>
                </div>
                <?php
            endwhile;
            ?>

        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="bg-primary text-white py-1 rounded">
                    <div class="ms-3">
                        <strong>NEWS</strong>
                    </div>
                </div>

                <?php
                if (isset($_GET['key'])) {
                    $sql = mysqli_query($conn, "SELECT * FROM tb_berita WHERE judul LIKE '%" . $_GET['key'] . "%' OR isi LIKE '%" . $_GET['key'] . "%'");

                } else {

                    $sql = mysqli_query($conn, "SELECT * FROM tb_berita WHERE terbit = '1' ORDER BY id_berita DESC LIMIT 0,10");
                }
                while ($row = mysqli_fetch_array($sql)):
                    extract($row);

                    // $result = mysqli_fetch_assoc($sql);
                
                    $id_berita = $row["id_berita"];
                    $judul = $row['judul'];
                    $kategori = $row['kategori'];
                    $isi = $row['isi'];
                    $gambar = $row['gambar'];
                    $teks = $row['teks'];
                    $terbit = $row['terbit'];
                    $author = $row['author'];
                    $tanggal = $row['tanggal'];
                    $view = $row['view'];

                    ?>
                    <a href="isi-berita.php?aksi=klik&id=<?= $id_berita ?>" style="text-decoration:none">
                        <div class="card my-3">
                            <img src="src/img/<?= $gambar ?>" alt="">
                            <div class="card-body">
                                <!-- judul -->
                                <h4><strong>
                                        <?= $judul ?>
                                    </strong></h4>
                                <p>
                                    <?= substr(strip_tags($isi), 0, 200) ?>
                                </p>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </a>

                    <?php
                endwhile;
                ?>
            </div>
            <div class="col-md-4">
                <div class="bg-primary text-white py-1 rounded">
                    <div class="ms-3">
                        <strong>Popular News</strong>
                    </div>
                </div>

                <?php
                $pop = mysqli_query($conn, "SELECT * FROM tb_berita WHERE terbit = '1' ORDER BY view DESC LIMIT 0,10");

                while ($run = mysqli_fetch_array($pop)):
                    extract($run);
                    ?>
                    <a href="isi-berita.php?aksi=klik&id=<?= $id_berita ?>" style="text-decoration:none">
                        <div class="card my-3">
                            <img src="src/img/<?= $gambar ?>" alt="">
                            <div class="card-body">
                                <!-- judul -->
                                <span>
                                    <?= substr($tanggal, 0, 10) ?> | view:
                                    <?= $view ?>
                                </span>
                                <h4><strong>
                                        <?= $judul ?>
                                    </strong></h4>
                                <p>
                                    <?= substr(strip_tags($isi), 0, 200) ?>
                                </p>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </a>
                    <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid bg-primary">
            <div class="container d-flex justify-content-between pt-sm-3 pb-sm-5">
                <div class="col">
                    <div class="col">
                        <p class="mt-3 text-white">Copyright &copy; 2023, by Maulana Sandi Samudera</p>
                    </div>
                    <div class="col pt-sm-3">
                        <img src="src/img/de_logo_white.png" width="300px">
                    </div>
                </div>
                <div class="col">
                    <?php
                    $tampil = mysqli_query($conn, "SELECT * FROM tb_konfigurasi ORDER BY id_konfi DESC");
                    while ($konpi = mysqli_fetch_array($tampil)):
                        $id_konfi = $konpi['id_konfi'];
                        $nama_konfi = $konpi['nama_konfi'];
                        $isi_konfi = $konpi['isi_konfi'];
                        $link = $konpi['link'];
                        ?>
                        <div class="col text-white">
                            <a class="text-white" href="<?= $link ?>"
                                style="text-decoration:none; text-transform:capitalize">
                                <?= $nama_konfi ?>
                            </a>
                            <p>
                                <?= $isi_konfi ?>
                            </p>
                        </div>

                        <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>