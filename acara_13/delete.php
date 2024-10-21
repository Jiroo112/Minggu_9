<?php
require_once __DIR__ . "/koneksi.php";
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM user_detail WHERE id='$id'");

header("location:home.php");
?>