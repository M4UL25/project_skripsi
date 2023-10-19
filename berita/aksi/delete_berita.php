<?php
// koneksi database
include '../../koneksi/koneksi.php';

// fungsi hapus data
if(isset($_GET['id'])){
    $id_berita = mysqli_real_escape_string($conn, $_GET['id']);
    $delete_berita = mysqli_query($conn, "DELETE FROM tb_berita WHERE id_berita = '$id_berita'");

    header("Location:../berita.php");
}

?>