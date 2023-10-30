<?php
include '../../koneksi/koneksi.php';
include '../../koneksi/session.php';

// fungsi tambah data
if (isset($_POST['tbh_berita'])) {

    // var_dump($_FILES);
    // die();

    // variable
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $isi = $_POST['isi'];
    $gambar = $_FILES['gambar']['name'];
    $teks = $_POST['teks'];
    $terbit = $_POST['terbit'];
    $author = $_SESSION['username'];
    
    $dir = "../../../src/img/";
    $tmpFile = $_FILES["gambar"]["tmp_name"];

    
    // die();

    if(empty($judul)){
        header("Location: ../berita.php?error=Nama Admin Is Required");
    } else if(empty($kategori)){
        header("Location: ../berita.php?error=Username Is Required");
    } else if(empty($isi)){
        header("Location: ../berita.php?error=Password Is Required");
    } else {

        // jalannya fungsi
        move_uploaded_file($tmpFile, $dir.$gambar);
        
        $query = mysqli_query($conn, "INSERT INTO tb_berita (judul, isi, kategori, gambar, teks, tanggal, view, author, post_type, terbit ) 
                                    VALUES ('$judul','$isi','$kategori', '$gambar', '$teks','date('Y-m-d H:i:s')', '0', '$author','berita','$terbit')");
        if ($query){
            header("Location: ../kategori.php");
        } else {
            echo    "<script>
                        alert('Simpan data Gagal');
                        document.location='../berita.php';
                    </script>"; 
        }
    }
}

// fungsi upload gambar
function upload_gambar() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile = explode('.', $namaFile);
    $extensifile = strtolower(end($extensifile));

    if(!in_array($extensifile, $extensifileValid)){
        // gagal

        echo "<script>
                alert('Format file tidak sesuai');
                document.location.href = '../berita.php';
                </script>";
        die();
    }

    if($ukuranFile > 2048000) {
        echo "<script>
                alert('ukuran file max 2 MB');
                document.location.href = '../berita.php';
                </script>";
        die();
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindah ke folder lokal
    move_uploaded_file($tmpName, '../../../src/img'. $namaFileBaru); 
    return $namaFileBaru;
    
}

?>