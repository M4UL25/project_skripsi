<?php
// koneksi database dan session
include '../koneksi/koneksi.php';
include '../koneksi/session.php';

// fungsi login
if (isset($_POST['btn_login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
    
    $cek = mysqli_num_rows($sql);
    
    if(empty($username)){
        header("Location: login.php?error=Username Is Required");
    } else if (empty($password)){
        header("Location: login.php?error=Password Is Required");
    } else {
        if ($cek > 0) {
            $_SESSION['username'] = $_POST['username'];
            header("Location: ../index.php");
        } else {
            header("location: login.php");
        }
    }
}
?>