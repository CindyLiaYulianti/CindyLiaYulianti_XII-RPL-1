<?php

include('koneksi.php');

//get id
$id_detail = $_GET['id_detail'];

$query = "DELETE FROM detail_penjualan WHERE id_detail = '$id_detail'";

if($dbconnect->query($query)) {
    header("location: detailpenjualan.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>