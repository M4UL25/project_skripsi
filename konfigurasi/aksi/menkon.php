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

    <?php
    if(isset($_POST['uploadlogo'])){
        if(!empty($_FILES['logositus']['name'])&&($_FILES['logositus']['error']!==4)){
            $filetype = $_FILES['logositus']['type'];
            
            $allowtype = array('image/jpeg', 'image/jpg','image/png');

            if(!in_array($filetype,$allowtype)){
                echo "Invalid file type';
            } else {
                $dest = '../'.PATH_LOGO.'/'.FILE_LOGO;

                copy($_FILES['logositus']['tmp_name'],$dest);
            }
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <img src="<?=URL_SITUS.PATH_LOGO.'/'.FILE_LOGO;?>" width="250">
                            <input type="file" name="logositus">
                            <input type="submit" name="uploadlogo" value="upload logo">
                        </form>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <img src="<?=URL_SITUS.'/'.FILE_ICON;?>" width="50">
                            <input type="file" name="iconsitus">
                            <input type="submit" name="uploadicon" value="upload icon">
                        </form>
                    </div>
                </div>
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