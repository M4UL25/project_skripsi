<?php
// koneksi dengan database mysql tb_admin
$servername = 'localhost';
$user = 'root';
$pass = '';
$database = 'b22_35434737_disaster_edukasi';

//
// define(URL_SITUS, 'http://localhost/portalberita/');
// define('PATH_LOGO', 'image');
// define('FILE_LOGO', 'logo.png');
// define('FILE_ICON', 'icon.png');
//

$conn = mysqli_connect($servername, $user, $pass, $database);

if(!$conn) {
    echo "Could not connect to database" . mysqli_connect_errno();
} else {
    // echo "Database connected";
    
}
?>