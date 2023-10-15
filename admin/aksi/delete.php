<?php
include '../../koneksi/koneksi.php';

if(isset($_GET['id'])){
    $id_admin = mysqli_real_escape_string($conn, $_GET['id']);
    $delete_admin = mysqli_query($conn, "DELETE FROM tb_admin WHERE id_admin = '$id_admin'");

    header("Location:../useradmin.php?dlt=Data berhasil dihapus");
}

?>