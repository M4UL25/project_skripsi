<?php
// koneksi database
include '../../koneksi/koneksi.php';

// fungsi hapus data
if(isset($_GET['id'])){
    $id_kategori = mysqli_real_escape_string($conn, $_GET['id']);
    $delete_kategori = mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = '$id_kategori'");

    header("Location:../kategori.php");
}

?>