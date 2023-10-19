<?php
include '../../koneksi/koneksi.php';
include '../../koneksi/session.php';

// fungsi tambah data
if (isset($_POST['tbh_berita'])) {

    // variable
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $isi = $_POST['isi'];
    $gambar = $_POST['gambar'];
    $teks = $_POST['teks'];
    $terbit = $_POST['terbit'];
    $author = $_SESSION['username'];
    

    if(empty($judul)){
        header("Location: ../berita.php?error=Nama Admin Is Required");
    } else if(empty($kategori)){
        header("Location: ../berita.php?error=Username Is Required");
    } else if(empty($isi)){
        header("Location: ../berita.php?error=Password Is Required");
    } else {

        // jalannya fungsi
        $query = mysqli_query($conn, "INSERT INTO tb_berita (judul, isi, kategori, gambar, teks, tanggal, view, author, post_type, terbit ) 
                                    VALUES ('$judul','$isi','$kategori', '$gambar', '$teks','date('Y-m-d H:i:s')', '0', '$author','berita','$terbit')");
        if ($query){
            header("Location: ../kategori.php");
        } else {
            echo    "<script>
                        alert('Simpan data Gagal');
                        document.location='../berita.php';
                    </script>"; 
        }
    }
}

?>