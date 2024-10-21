<?php
require('koneksi.php');
require('query.php');

$obj = new crud;

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID not found.');

if ($obj->deleteData($id)) {
    header("Location: home.php");
    exit();
} else {
    echo "Gagal menghapus data";
}
?>