<?php
include '../koneksi/koneksi.php';

if (isset($_POST['aksi'])) {
    
    // variable
    $id_kategori = $_POST['id_kategori'];
    $kategori = $_POST['kategori'];
    $alias = $_POST['alias'];
    $terbit = $_POST['terbit'];

    if ($_POST['aksi'] == 'add') {
        echo 'tambah';

        if (empty($kategori)) {
            header("Location: kategori.php?error=Kategori Is Required");
        } else if (empty($alias)) {
            header("Location: kategori.php?error=Alias Is Required");
        } else if (empty($terbit)) {
            header("Location: kategori.php?error=Terbit Is Required");
        } else {

            // jalannya fungsi
            $query = mysqli_query($conn, "INSERT INTO tb_kategori (kategori, alias, terbit) VALUES ('$kategori','$alias','$terbit')");
            if ($query) {
                header("Location: kategori.php?scc=Data Berhasil Disimpan");
            } else {
                echo "<script>
                        alert('Simpan data Gagal');
                        document.location='kategori.php';
                    </script>";
            }
        }

    } else if ($_POST['aksi'] == 'ubah') {
        echo 'ubah';

        // jalannya fungsi
        $sql = "UPDATE tb_kategori SET kategori = '$kategori', alias = '$alias', terbit = '$terbit' WHERE id_kategori = '$id_kategori'";
        $run = mysqli_query($conn, $sql);

        if ($run) {
            header("Location:kategori.php?edt=Data berhasil diubah");
        }
    }
} else if (isset($_GET['aksi'])) {
    if (($_GET['aksi'] == 'delete')) {
        echo 'hapus';

        $id_kategori = mysqli_real_escape_string($conn, $_GET['id']);
        $delete_kategori = mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = '$id_kategori'");

        header("Location:kategori.php?dlt=Data berhasil dihapus");
    }
}
?>