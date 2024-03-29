<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="../../src/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="my-bg" style="background-color: #EBF3E8">
    <div class="container d-flex align-items-center" style="min-height:80vh">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">

                    <!-- logo and tittle login  -->
                    <div class="card-header text-center bg-primary text-white">
                        <div class="container">
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <img class="m-4" src="../../src/img/de_logo_white.png" width="60%" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- alert login -->
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-warning alert-dismissible fade show mt-4 ms-3 me-3" role="alert">
                            <?= $_GET['error'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <!-- input username and password for login -->
                    <form action="ceklogin.php" method="post">
                        <div class="card-body">

                            <!-- username -->
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-person"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                    </svg></span>
                                <input type="text" name="username" class="form-control" placeholder="username"
                                    aria-label="username" aria-describedby="basic-addon1">
                            </div>

                            <!-- password -->
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-unlock"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z" />
                                    </svg></span>
                                <input type="password" name="password" id="inputPassword5" class="form-control"
                                    aria-describedby="passwordHelpBlock" class="form-control" placeholder="password"
                                    aria-label="password" aria-describedby="basic-addon1">
                            </div>

                            <!-- button login -->
                            <div class="row ms-0 me-0 mb-2 mt-4">
                                <button type="submit" class="btn btn-primary p-3" name="btn_login"
                                    value="register"><h5>Login</h5></button>
                            </div>

                            <!-- <div class="text-center">
                                Belum punya akun, silahkan <a href="../register/daftar.php">Daftar</a>
                            </div> -->
                        </div>
                    </form>
                </div>
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