<?php
include "../koneksi/koneksi.php";

$sql = mysqli_query($conn, "SELECT * FROM tb_admin ORDER BY id_admin ASC");
$i=0;

while($r = mysqli_fetch_array($sql)){
    extract($r);

    echo'
    <tr></tr>
    <td scope="col">'.$i++.'</td>
    <td scope="col">'.$nama_admin.'</td>
    <td scope="col">'.$username.'</td>
    <td scope="col">'.$no_hp_admin.'</td>
    <td scope="col">'.$email_admin.'</td>
    <td scope="col">
        <a href="" class="btn btn-primary">Edit</a> <a href="" class="btn btn-danger">Delete</a> 
    </td>
    ';
}
?>