<?php
// fungsi session
session_start();
if(!isset($_SESSION['username'])){
    header('location: login/login.php');
}
?>