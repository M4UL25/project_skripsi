<?php
// koneksi database
include '../../koneksi/koneksi.php';

// fungsi tambah data
if (isset($_POST['tbh_konfigurasi'])) {

    // variable
    $nama_konfi = $_POST['nama_konfi'];
    $tax = $_POST['tax'];
    $isi_konfi = $_POST['isi_konfi'];
    $link = $_POST['link'];


    // jalannya fungsi
    $query = mysqli_query($conn, "INSERT INTO tb_konfigurasi (nama_konfi, tax, isi_konfi, link, tipe) VALUES ('$nama_konfi','$tax','$isi_konfi','$link', 'konfigurasi')");
    if ($query){
        header("Location:../konfigurasi.php");
        // echo "berhasil";
    } else {
        // echo    "<script>
        //             alert('Simpan data Gagal');
        //             document.location='../useradmin.php';
        //         </script>"; 
        // echo "gagal";
        header("Location:../konfigurasi.php");
    }
}

// fungsi edit data
if (isset($_POST['edit_konfigurasi'])) {

    // variable
    $id_konfi = $_POST['id_admin'];
    $nama_konfi = $_POST['nama_admin'];
    $tax = $_POST['username'];
    $isi_konfi = $_POST['password'];
    $link = $_POST['no_hp_admin'];

    // jalannya fungsi
    $sql =  "UPDATE tb_konfigurasi SET nama_konfi = '$nama_konfi', tax = '$tax', isi_konfi = '$isi_konfi', link = '$link' WHERE id_konfi = '$id_konfi'";
    $run = mysqli_query($conn, $sql);
    
    if ($run) {
        // echo "berhasil";
        header("Location:../konfigurasi.php");
    } 
}

// fungsi hapus data
if(isset($_GET['id'])){
    $id_konfi = mysqli_real_escape_string($conn, $_GET['id']);
    $delete_konfi = mysqli_query($conn, "DELETE FROM tb_konfigurasi WHERE id_konfi = '$id_konfi'");

    header("Location:../konfigurasi.php");
}
?>