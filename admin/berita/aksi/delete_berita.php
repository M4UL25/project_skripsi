<?php
// koneksi database
include '../../koneksi/koneksi.php';

// fungsi hapus data
if(isset($_GET['id'])){
    $id_berita = mysqli_real_escape_string($conn, $_GET['id']);

    $queryShow = "SELECT * FROM tb_berita WHERE id_berita = '$id_berita'";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    // var_dump($result);

    unlink("../../../src/img/".$result['gambar']);

    $delete_berita = mysqli_query($conn, "DELETE FROM tb_berita WHERE id_berita = '$id_berita'");

    header("Location:../berita.php");
}

?>