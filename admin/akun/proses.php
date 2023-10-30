<?php
include("../koneksi/koneksi.php");

if (isset($_POST['aksi'])) {

    // variable
    $id_admin = $_POST['id_admin'];
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp_admin = $_POST['no_hp_admin'];
    $email_admin = $_POST['email_admin'];

    if (($_POST['aksi'] == 'add')) {

        if (empty($nama_admin)) {
            header("Location: admin.php?error=Nama Admin Is Required");
        } else if (empty($username)) {
            header("Location: admin.php?error=Username Is Required");
        } else if (empty($password)) {
            header("Location: admin.php?error=Password Is Required");
        } else if (empty($no_hp_admin)) {
            header("Location: admin.php?error=No Hp Is Required");
        } else if (empty($email_admin)) {
            header("Location: admin.php?error=Email Is Required");
        } else {

            // jalannya fungsi
            $query = mysqli_query($conn, "INSERT INTO tb_admin (nama_admin, username, password, no_hp_admin, email_admin) VALUES ('$nama_admin','$username','$password','$no_hp_admin','$email_admin')");
            if ($query) {
                header("Location: admin.php?scc=Data Berhasil Disimpan");
            } else {
                header("Location: admin.php?error=Data Gagal Disimpan");
            }
        }
    } else if (($_POST['aksi'] == 'ubah')) {

        // jalannya fungsi
        $sql = "UPDATE tb_admin SET nama_admin = '$nama_admin', username = '$username', password = '$password', no_hp_admin = '$no_hp_admin', email_admin = '$email_admin' WHERE id_admin = '$id_admin'";
        $run = mysqli_query($conn, $sql);

        if ($run) {
            header("Location: admin.php?edt=Data berhasil diubah");
        }
    }

} else if (isset($_GET['aksi'])) {
    if (($_GET['aksi'] == 'delete')) {
        $id_admin = mysqli_real_escape_string($conn, $_GET['id']);
        $delete_admin = mysqli_query($conn, "DELETE FROM tb_admin WHERE id_admin = '$id_admin'");

        header("Location: admin.php?dlt=Data berhasil dihapus");
    }
}
?>