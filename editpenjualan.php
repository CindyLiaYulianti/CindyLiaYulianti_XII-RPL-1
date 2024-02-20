
<?php

include 'koneksi.php';
session_start();


if (isset($_GET['id_penjualan'])) {
    $id_penjualan = $_GET['id_penjualan'];

    //menampilkan data berdasarkan ID
    $data = mysqli_query($dbconnect, "SELECT * FROM penjualan where id_penjualan='$id_penjualan'");
    $data = mysqli_fetch_assoc($data);
}

if (isset($_POST['update'])) {
    $id_penjualan = $_GET['id_penjualan'];

    $id_penjualan = $_POST['id_penjualan'];
    $tanggal_penjualan = $_POST['tanggal_penjualan'];
    $total_harga = $_POST['total_harga'];
    

    // Menyimpan ke database;
    mysqli_query($dbconnect, "UPDATE penjualan SET id_penjualan='$id_penjualan', tanggal_penjualan='$tanggal_penjualan', total_harga='$total_harga' where id_penjualan='$id_penjualan' ");

    $_SESSION['success'] = 'Berhasil memperbaruhi data';

    // mengalihkan halaman ke list barang
    header('location:penjualan.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Produk</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Edit Penjualan</h1>
	<form method="post">
	  <div class="form-group">
	    <label>ID Penjualan</label>
	    <input type="text" name="id_penjualan" class="form-control" placeholder="ID Penjualan" value="<?=$data['id_penjualan']?>">
	  </div>
	  <div class="form-group">
	    <label>Tanggal Penjualan</label>
	    <input type="date" name="tanggal_penjualan" class="form-control" value="<?=$data['tanggal_penjualan']?>">
	  </div>
	  <div class="form-group">
	    <label>Total Harga</label>
	    <input type="number" name="total_harga" class="form-control" placeholder=" Total Harga" value="<?=$data['total_harga']?>">
	  </div>
	  
  	<input type="submit" name="update" value="Perbaruhi" class="btn btn-primary">
  	<a href="produk.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
</body>
</html>