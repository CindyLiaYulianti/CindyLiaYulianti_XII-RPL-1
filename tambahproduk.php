
<?php

include 'koneksi.php';
session_start();


if (isset($_POST['simpan'])) {
	// echo var_dump($_POST);
	$id_produk = $_POST['id_produk'];
	$nama_produk = $_POST['nama_produk'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];

	$selSto =mysqli_query($dbconnect, "SELECT * FROM produk WHERE id_produk='$id_produk'");
    $sto    =mysqli_fetch_array($selSto);
    $stok    =$sto['stok'];
    //menghitung sisa stok
    $sisa    =$stok-$jumlah_produk;

	
	// Menyimpan ke database;
	mysqli_query($dbconnect, "INSERT INTO produk VALUES ('$id_produk','$nama_produk','$harga','$stok')");

	$upstok= mysqli_query($dbconnect, "UPDATE produk SET stok='$sisa' WHERE id_produk='$id_produk'");


	$_SESSION['success'] = 'Berhasil menambahkan data';

	// mengalihkan halaman ke list barang
	header("location:produk.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Produk</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Tambah Produk</h1>
	<form method="post">
	  <div class="form-group">
	    <label>ID Produk</label>
	    <input type="text" name="id_produk" class="form-control" placeholder="ID Produk">
	  </div>
	  <div class="form-group">
	    <label>Nama Produk</label>
	    <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk">
	  </div>
	  <div class="form-group">
	    <label>Harga</label>
	    <input type="number" name="harga" class="form-control" placeholder="Harga Produk">
	  </div>
	  <div class="form-group">
	    <label>Stock</label>
	    <input type="number" name="stok" class="form-control" placeholder="Stok Produk">
	  </div>
  	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
  	<a href="produk.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
</body>
</html>