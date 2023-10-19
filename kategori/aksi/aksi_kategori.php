<?php
include '../../koneksi/koneksi.php';

// fungsi tambah data
if (isset($_POST['tbh_kategori'])) {

    // variable
    $kategori = $_POST['kategori'];
    $alias = $_POST['alias'];
    $terbit = $_POST['terbit'];

    

    if(empty($kategori)){
        header("Location: ../kategori.php?error=Nama Admin Is Required");
    } else if(empty($alias)){
        header("Location: ../kategori.php?error=Username Is Required");
    } else if(empty($terbit)){
        header("Location: ../kategori.php?error=Password Is Required");
    } else {

        // jalannya fungsi
        $query = mysqli_query($conn, "INSERT INTO tb_kategori (kategori, alias, terbit) VALUES ('$kategori','$alias','$terbit')");
        if ($query){
            header("Location: ../kategori.php");
        } else {
            echo    "<script>
                        alert('Simpan data Gagal');
                        document.location='../kategori.php';
                    </script>"; 
        }
    }
}

?>