<?php

include '../koneksi/koneksi.php';
include '../koneksi/session.php';

if (isset($_POST['btn_login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");
    // $data = mysqli_fetch_array($query);

    // if(mysqli_num_rows($query)==1){
    //     if(password_verify($password, $data['password'])){
    //         //login valid
    //         header("location:index.php");
    //     } else {
    //         //password invalid
    //         header('location:login.php? pesan = Password incorrect');
    //     }
    // } else {
    //     //username invalid
    //     header('location:login.php? pesan = username incorrect');
    // }
    
    // new
    $sql = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
    
    $cek = mysqli_num_rows($sql);
    
    if(empty($username)){
        header("Location: login.php?error=Username Is Required");
    } else if (empty($password)){
        header("Location: login.php?error=Password Is Required");
    } else {
        if ($cek > 0) {
            $_SESSION['username'] = $_POST['username'];
    
            // echo "<meta http-equiv=refresh content=0; URL='index.php'>";
            header("Location: ../index.php");
        } else {
            // echo "<p align=center><b> Username not found</b></p>";
            // echo "<meta http-equiv=refresh content=2; URL='login.php'>";
            header("location: login.php");
        }
    }
    

}

// if(isset($_POST['btn_login'])){
//     global $conn;

//     $username = mysqli_real_escape_string($conn,$_POST['username']);
//     $password = mysqli_real_escape_string($conn,$_POST['password']);

//     $sql = "SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password'";

//     $result = mysqli_query($conn,$sql);
//     $numrow = mysqli_num_rows($result);

//     $r = mysqli_fetch_array($result,MYSQLI_ASSOC);

//     if ($numrow > 0) {

//     }
// }
?>