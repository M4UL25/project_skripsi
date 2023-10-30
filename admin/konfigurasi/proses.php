<?php
include("../koneksi/koneksi.php");

if (isset($_POST['aksi'])) {

    // variable
    $id_konfi = $_POST['id_konfi'];
    $nama_konfi = $_POST['nama_konfi'];
    $tax = $_POST['tax'];
    $isi_konfi = $_POST['isi_konfi'];
    $link = $_POST['link'];

    if ($_POST['aksi'] == 'add') {
        echo 'tambah';

        if (empty($nama_konfi)) {
            header("Location: konfigurasi.php?error=Konfigurasi Is Required");
        } else if (empty($tax)) {
            header("Location: konfigurasi.php?error=Tax Is Required");
        } else if (empty($isi_konfi)) {
            header("Location: konfigurasi.php?error=Isi Is Required");
        } else {
            
            // jalannya fungsi
            $query = mysqli_query($conn, "INSERT INTO tb_konfigurasi (nama_konfi, tax, isi_konfi, link, tipe) VALUES ('$nama_konfi','$tax','$isi_konfi','$link', 'konfigurasi')");
            if ($query) {
                header("Location:konfigurasi.php?scc=Data Berhasil Disimpan");
            } else {
                header("Location:konfigurasi.php?error=Data Gagal Disimpan");
            }
        }
    } else if ($_POST['aksi'] == 'ubah') {
        // echo 'ubah';

        // jalannya fungsi
        $sql = "UPDATE tb_konfigurasi SET nama_konfi = '$nama_konfi', tax = '$tax', isi_konfi = '$isi_konfi', link = '$link' WHERE id_konfi = '$id_konfi'";
        $run = mysqli_query($conn, $sql);

        if ($run) {
            header("Location:konfigurasi.php?edt=Data berhasil diubah");
        }
    }
} else if ($_GET['aksi']) {
    if ($_GET['aksi'] == 'delete') {
        echo 'HAPUS';

        $id_konfi = mysqli_real_escape_string($conn, $_GET['id']);
        $delete_konfi = mysqli_query($conn, "DELETE FROM tb_konfigurasi WHERE id_konfi = '$id_konfi'");

        header("Location:konfigurasi.php?dlt=Data berhasil dihapus");
    }
}

?>