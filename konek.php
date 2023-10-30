<?php
    $servername = "localhost";
    $database = "quiz";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if($conn){
        echo "berhasil";
    } else{
        echo "tidak";
    }
?>