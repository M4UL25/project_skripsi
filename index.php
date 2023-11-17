<?php
include 'admin/koneksi/koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edukasi Bencana</title>
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
                <img src="src/img/de_logo.png" width="20%" alt="">
                <div class="row">
                    <div class="col-sm-4 navbar-nav">
                        <a class="nav-link" aria-current="page" href="index.php">
                            <h5>Edukasi</h5>
                        </a>
                    </div>
                    <div class="col-sm-4 navbar-nav">
                        <a class="nav-link" aria-current="page" href="berita.php">
                            <h5>Berita</h5>
                        </a>
                    </div>
                    <div class="col-sm-4 navbar-nav">
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

    <section id="hero-section">
        <div class="container d-flex">
            <div class="row mt-5">
                <div class="col">
                    <h1 class="hero1 f-ab">BENCANA</h1>
                    <p class="hero_isi f-pop">Peristiwa atau rangkaian peristiwa yang mengancam dan mengganggu <br>
                        kehidupan dan penghidupan masyarakat yang disebabkan, baik oleh faktor alam <br>dan/atau
                        faktor nonalam maupun faktor manusia sehingga mengakibatkan timbulnya <br>korban jiwa
                        manusia, kerusakan lingkungan, kerugian harta benda, dan dampak psikologis</p>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid pt-5" style="background-color: white;">
        <div class="container">
            <div class="row">
                <div class="col-6 f-ab mt-5">
                    <h2 class="mt-5">Indonesia berada pada posisi</h2>
                    <div class="col f-ab" style="text-transform: capitalize">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h5>lempeng australia</h5>
                            </li>
                            <li class="list-group-item">
                                <h5>lempeng pasifik</h5>
                            </li>
                            <li class="list-group-item">
                                <h5>lempeng eurasia</h5>
                            </li>
                            <li class="list-group-item">
                                <h5>lempeng filipina</h5>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                    <img src="src/img/map.jpg" width="700px">
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row mb-5">
            <h2 class="f-ab text-center">Bencana dapat dibagi menjadi beberapa Kategori</h2>
        </div>
        <div class="row mb-5">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img style="" src="src/img/eartquake.jpeg" alt="">
                    <div class="card-body text-center">
                        <h3 class="f-ab">Geologi</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img style="" src="src/img/flood.jpeg" alt="">
                    <div class="card-body text-center">
                        <h3 class="f-ab">Hidrometeorologi</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img style="" src="src/img/epidemic.jpeg" alt="">
                    <div class="card-body text-center">
                        <h3 class="f-ab">Biologi</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img style="" src="src/img/kegagalan-teknologi.jpeg" alt="">
                    <div class="card-body text-center">
                        <h3 class="f-ab">Kegagalan Teknologi</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img style="" src="src/img/lingkungan.jpeg" alt="">
                    <div class="card-body text-center">
                        <h3 class="f-ab">Lingkungan</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img style="" src="src/img/sosial.jpeg" alt="">
                    <div class="card-body text-center">
                        <h3 class="f-ab">Sosial</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="col-md-10 mt-3">
                        <h1 class="f-ab">MITIGASI</h1>
                        <p class="f-pop">Menurut UU No. 1 Tahun 2014, mitigasi bencana didefinisikan sebagai upaya untuk
                            mengurangi risiko
                            bencana, baik secara struktur atau fisik yaitu melalui pembangunan fisik alami dan/atau
                            buatan
                            maupun non struktur atau nonfisik melalui peningkatan kemampuan menghadapi ancaman bencana
                            di
                            Wilayah Pesisir dan Pulau-Pulau Kecil (WP3K). </p>

                        <p class="f-pop">Tujuan dari Mitigasi</p>
                        <ol class="list-group-numbered f-pop">
                            <li class="list-group-item">Meminimalisir adanya korban jiwa akibat bencana.</li>
                            <li class="list-group-item">Meminimalisir kerugian yang diakibatkan oleh bencana.</li>
                            <li class="list-group-item">Meminimalisir kerusakan pada sumber daya alam (SDA).</li>
                            <li class="list-group-item">Sebagai pedoman pemerintah dalam merencanakan pembangunan di
                                masa depan.</li>
                            <li class="list-group-item">Meningkatkan kesadaran masyarakat mengenai resiko dan dampak
                                dari adanya bencana.</li>
                            <li class="list-group-item">Membuat masyarakat merasa lebih nyaman dan juga aman.</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="src/img/mitigasi.webp" width="900px">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mt-5">
                    <h1 class="f-ab">Partisipasi Masyarakat dalam Mitigasi Bencana</h1>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-4">
                    <h3 class="f-ab text-center">Pra-Bencana</h3>
                    <ul>
                        <li>Menganalisis risiko bencana;</li>
                        <li>Melakukan penelitian terkait kebencanaan;</li>
                        <li>Pelatihan atau pendidikan mengenai kebencanaan;</li>
                        <li>Membentuk atau bergabung dalam organisasi tanggap bencana.</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="f-ab text-center">Saat Bencana</h3>
                    <ul>
                        <li>Diharapkan masyarakat dapat melakukan evakuasi mandiri sebelum bantuan datang;</li>
                        <li>Segera menginformasikan ke instansi terkait, seperti umumnya BNPB;</li>
                        <li>Merespons tanggap darurat, membantu masyarakat lainnya sesuai keahlian masing-masing.</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="f-ab text-center">Pasca-Bencana</h3>
                    <ul>
                        <li>Mengerahkan relawan beserta dengan dukungan logistik, peralatan evakuasi, serta pemenuhan
                            kebutuhan dasar, </li>
                        <li>Melakukan rehabilitasi, dan normalisasi, kegiatan layanan publik,</li>
                        <li>Rekonstruksi, pembangunan kembali sarana prasarana, serta kelembagaan dan instansi terkait.
                        </li>
                    </ul>
                </div>
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
                <div class="col">
                    <form action="">
                        <h3 class="text-white">Kritik dan Saran</h3>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label text-white">Nama</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label text-white">Pesan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="col-12" align="right">
                            <button type="submit" class="btn btn-light" name="aksi" value="kirim">Kirim</button>
                        </div>
                    </form>
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