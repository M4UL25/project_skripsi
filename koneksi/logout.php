<?php
    // fungsi keluar menu admin
    session_start();
    session_destroy();
    header("location: ../login/login.php");
?>