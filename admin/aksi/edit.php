<?php
include '../../koneksi/koneksi.php';

if (isset($_POST['btn_edit'])) {
    $id_admin = $_POST['id_admin'];
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp_admin = $_POST['no_hp_admin'];
    $email_admin = $_POST['email_admin'];

    // $id_admin = mysqli_real_escape_string($conn, $_GET['id']);
    // $sql = "UPDATE tb_admin SET 
    //                 nama_admin = '$nama_admin', 
    //                 username = '$username',  
    //                 password = '$password',  
    //                 no_hp_admin = '$no_hp_admin',  
    //                 email_admin = '$email_admin',  
    //             WHERE id_admin = '$id_admin'";
    
    // $run = mysqli_query($conn, $sql);
    $sql =  "UPDATE tb_admin SET nama_admin = '$nama_admin', username = '$username', password = '$password', no_hp_admin = '$no_hp_admin', email_admin = '$email_admin' WHERE id_admin = '$id_admin'";
    $run = mysqli_query($conn, $sql);
    // $run = mysqli_query($conn, "UPDATE tb_admin SET nama_admin = '$nama_admin', username = '$username', password = '$password', no_hp_admin = '$no_hp_admin', email_admin = '$email_admin', WHERE id_admin = '$id_admin'");
    if ($run) {
        header("Location:../useradmin.php?edt=Data berhasil diubah");
        // header("Location: ../useradmin.php?scc=Data Berhasil Disimpan");
        // echo "<script>
        //             alert('Simpan data Berhasil');
        //             document.location='../useradmin.php';
        //         </script>";
    } 
    // if (isset($_GET['id'])) {
    // }
}

?>