<?php
// koneksi database
include '../../koneksi/koneksi.php';

// fungsi edit data
if (isset($_POST['btn_edit'])) {

    // variable
    $id_admin = $_POST['id_admin'];
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp_admin = $_POST['no_hp_admin'];
    $email_admin = $_POST['email_admin'];

    // jalannya fungsi
    $sql =  "UPDATE tb_admin SET nama_admin = '$nama_admin', username = '$username', password = '$password', no_hp_admin = '$no_hp_admin', email_admin = '$email_admin' WHERE id_admin = '$id_admin'";
    $run = mysqli_query($conn, $sql);
    
    if ($run) {
        header("Location:../useradmin.php?edt=Data berhasil diubah");
    } 
}

?>