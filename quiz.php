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
                <form class="d-flex" role="search">
                    <input class="form-control me-2 rounded-pill" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success rounded-pill" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>



    <div class="container my-5">
        <h1 class="f-ab d-inline text-bg-primary px-3 rounded-pill">QUIZ</h1>
        <div class="row mt-5 d-flex justify-content-center">
            <a class="col-md-5" href="isiquiz.php">
                <div class="shadow-lg text-center text-bg-primary p-5 rounded">
                    <h1 class="f-ab">GEOLOGI</h1>
                </div>
            </a>
        </div>
        <div class="row mt-5 d-flex justify-content-center">
            <a class="col-md-5" href="isiquiz.php">
                <div class="shadow-lg text-center text-bg-primary p-5 rounded">
                    <h1 class="f-ab">SOSIAL</h1>
                </div>
            </a>
        </div>
        <div class="row mt-5 d-flex justify-content-center">
            <a class="col-md-5" href="isiquiz.php">
                <div class="shadow-lg text-center text-bg-primary p-5 rounded">
                    <h1 class="f-ab">BIOLOGI</h1>
                </div>
            </a>
        </div>
    </div>

    <footer>
        <div class="container-fluid bg-primary">
            <div class="row text-center text-white">
                <p class="mt-3">Copyright &copy; 2023, by Maulana Sandi Samudera</p>
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