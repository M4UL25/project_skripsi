<?php

$servername = 'localhost';
$user = 'root';
$pass = '';
$database = 'disaster_edukasi';

$conn = mysqli_connect($servername, $user, $pass, $database);

if(!$conn) {
    echo "Could not connect to database" . mysqli_connect_errno();
} else {
    // echo "Database connected";
    
}
?>