
<?php

include 'koneksi.php';
session_start();


if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    //menampilkan data berdasarkan ID
    $data = mysqli_query($dbconnect, "SELECT * FROM produk where id_produk='$id_produk'");
    $data = mysqli_fetch_assoc($data);
}

if (isset($_POST['update'])) {
    $id_produk = $_GET['id_produk'];

    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Menyimpan ke database;
    mysqli_query($dbconnect, "UPDATE produk SET id_produk='$id_produk', nama_produk='$nama_produk', harga='$harga', stok='$stok' where id_produk='$id_produk' ");

    $_SESSION['success'] = 'Berhasil memperbaruhi data';

    // mengalihkan halaman ke list barang
    header('location:produk.php');
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
	<h1>Edit Produk</h1>
	<form method="post">
	  <div class="form-group">
	    <label>ID Produk</label>
	    <input type="text" name="id_produk" class="form-control" placeholder="ID Produk" value="<?=$data['id_produk']?>">
	  </div>
	  <div class="form-group">
	    <label>Nama Produk</label>
	    <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?=$data['nama_produk']?>">
	  </div>
	  <div class="form-group">
	    <label>Harga</label>
	    <input type="number" name="harga" class="form-control" placeholder="Harga Produk" value="<?=$data['harga']?>">
	  </div>
	  <div class="form-group">
	    <label>Stock</label>
	    <input type="number" name="stok" class="form-control" placeholder="Stok Produk" value="<?=$data['stok']?>">
	  </div>
  	<input type="submit" name="update" value="Perbaruhi" class="btn btn-primary">
  	<a href="produk.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
</body>
</html>