<?php

include('koneksi.php');

//get id
$id_penjualan = $_GET['id_penjualan'];

$query = "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'";

if($dbconnect->query($query)) {
    header("location: penjualan.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>