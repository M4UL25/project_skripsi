<?php
include 'koneksi.php';

function getprofilweb($tax){
    global $conn;

    $hasil = mysqli_query($conn, "SELECT * FROM tb_konfigurasi WHERE tax = '$tax' ORDER BY id_konfi DESC LIMIT 1");
    while ($r = mysqli_fetch_array($hasil)) {
        return $r['isi_konfi'];
    }
}
?>