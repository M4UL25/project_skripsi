<?php
include '../koneksi/koneksi.php';

if (isset($_POST['btn_daftar'])) {
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp_admin = $_POST['no_hp_admin'];
    $email_admin = $_POST['email_admin'];

    $query = mysqli_query($conn, "INSERT INTO tb_admin (nama_admin, username, password, no_hp_admin, email_admin) VALUES ('$nama_admin','$username','$password','$no_hp_admin','$email_admin')");

    if ($query){
        // echo "berhasil";
        // header('location:../login/login.php');
        echo    "<script>
                    alert('Simpan data Sukses');
                    document.location='../admin/useradmin.php';
                </script>";     
        exit();
        // header("location: useradmin.php");
    } else {
        echo    "<script>
                    alert('Simpan data Gagal');
                    document.location='../admin/useradmin.php';
                </script>"; 
    }

}
?>