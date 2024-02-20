<?php

include('koneksi.php');

//get id
$id_produk = $_GET['id_produk'];

$query = "DELETE FROM produk WHERE id_produk = '$id_produk'";

if($dbconnect->query($query)) {
    header("location: produk.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>