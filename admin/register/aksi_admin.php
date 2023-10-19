<?php
// koneksi database
include '../../koneksi/koneksi.php';

// fungsi tambah data
if (isset($_POST['btn_daftar'])) {

    // variable
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp_admin = $_POST['no_hp_admin'];
    $email_admin = $_POST['email_admin'];

    

    if(empty($nama_admin)){
        header("Location: ../useradmin.php?error=Nama Admin Is Required");
    } else if(empty($username)){
        header("Location: ../useradmin.php?error=Username Is Required");
    } else if(empty($password)){
        header("Location: ../useradmin.php?error=Password Is Required");
    } else if(empty($no_hp_admin)){
        header("Location: ../useradmin.php?error=No Hp Is Required");
    } else if(empty($email_admin)){
        header("Location: ../useradmin.php?error=Email Is Required");
    } else {

        // jalannya fungsi
        $query = mysqli_query($conn, "INSERT INTO tb_admin (nama_admin, username, password, no_hp_admin, email_admin) VALUES ('$nama_admin','$username','$password','$no_hp_admin','$email_admin')");
        if ($query){
            header("Location: ../useradmin.php?scc=Data Berhasil Disimpan");
        } else {
            echo    "<script>
                        alert('Simpan data Gagal');
                        document.location='../useradmin.php';
                    </script>"; 
        }
    }
}
?>