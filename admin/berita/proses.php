<?php
include "../koneksi/koneksi.php";
include "../koneksi/session.php";

if (isset($_POST["aksi"])) {

    // variable
    $id_berita = $_POST["id_berita"];
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $isi = $_POST['isi'];
    $gambar = $_FILES['gambar']['name'];
    $teks = $_POST['teks'];
    $terbit = $_POST['terbit'];
    $author = $_SESSION['username'];

    date_default_timezone_set("Asia/Jakarta");
    // echo "tanggal ". date("Y-m-d H:i:s");
    $tanggal = date("Y-m-d H:i:s");

    $dir = "../../src/img/";
    $tmpFile = $_FILES["gambar"]["tmp_name"];

    if (($_POST['aksi'] == 'add')) {

        if (empty($judul)) {
            header("Location: berita.php?error=Judul Is Required");
        } else if (empty($kategori)) {
            header("Location: berita.php?error=Kategori Is Required");
        } else if (empty($isi)) {
            header("Location: berita.php?error=Isi Is Required");
        } else {

            // jalannya fungsi
            move_uploaded_file($tmpFile, $dir . $gambar);
            $query = mysqli_query($conn, "INSERT INTO tb_berita (judul, isi, kategori, gambar, teks, tanggal, view, author, post_type, terbit ) 
                                    VALUES ('$judul','$isi','$kategori', '$gambar', '$teks', '$tanggal', '0', '$author','berita','$terbit')");
            if ($query) {
                header("Location: berita.php?scc=Data Berhasil Disimpan");
            } else {
                header("Location: berita.php?error=Data Gagal Disimpan");
            }
        }
    } else if ($_POST['aksi']== 'ubah'){
        // echo "edit";
        // die();

        // jalannya fungsi
        $sql = "UPDATE tb_berita SET judul = '$judul', isi = '$isi', kategori = '$kategori', gambar = '$gambar', teks = '$teks', terbit = '$terbit' WHERE id_berita = '$id_berita'";
        $run = mysqli_query($conn, $sql);

        if ($run) {
            header("Location: berita.php?edt=Data berhasil diubah");
        }
    }
} else if (isset($_GET['aksi'] )) {
    if($_GET['aksi'] == 'delete') {
        // echo "delete";
        // die();
        
        $id_berita = mysqli_real_escape_string($conn, $_GET['id']);
        $delete_admin = mysqli_query($conn, "DELETE FROM tb_berita WHERE id_berita = '$id_berita'");

        header("Location: berita.php?dlt=Data berhasil dihapus");
    }
}
?>