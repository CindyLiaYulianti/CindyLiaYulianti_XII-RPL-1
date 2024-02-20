
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'koneksi.php';

    $id_penjualan = $_POST["id_penjualan"];
    $tanggal_penjualan = $_POST["tanggal_penjualan"];
    $id_detail = $_POST["id_detail"];
    $id_produk = $_POST["id_produk"];
    $jumlah_produk = $_POST["jumlah_produk"];
    $total_harga = $_POST["total_harga"];
    $subtotal = $_POST["subtotal"];

    $selSto =mysqli_query($dbconnect, "SELECT * FROM penjualan WHERE id_penjualan='$id_penjualan'");
    $sto    =mysqli_fetch_array($selSto);
    $stok    =$sto['stok'];
    //menghitung sisa stok
    $sisa    =$stok+$jumlah_produk;

    // Insert data into masyarakat table
    $sqlPenjualan = "INSERT INTO penjualan (id_penjualan, tanggal_penjualan, total_harga) VALUES ('$id_penjualan', '$tanggal_penjualan', '$total_harga')";
    $dbconnect->query($sqlPenjualan);

    // Get the last inserted ID
    $lastID = $dbconnect->insert_id;

    // Insert data into pengaduan table
    $sqlDetailPenjualan = "INSERT INTO detail_penjualan (id_detail, id_produk, jumlah_produk, subtotal) VALUES ('$id_detail', '$id_produk', '$jumlah_produk', '$subtotal')";
    $dbconnect->query($sqlDetailPenjualan);

    $upstok= mysqli_query($dbconnect, "UPDATE penjualan SET stok='$sisa' WHERE id_penjualan='$id_penjualan'");

    // Close the database connection
    $dbconnect->close();

    // Redirect to a success page or do something else
    header("Location: penjualan.php");
    exit();
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
	<h1>Tambah Penjualan</h1>
	<form method="post">
	  <div class="form-group">
	    <label>ID Penjualan</label>
	    <input type="text" name="id_penjualan" class="form-control" placeholder="ID Penjualan">
	  </div>
      <div class="form-group">
	    <label>Tanggal Penjualan</label>
	    <input type="date" name="tanggal_penjualan" class="form-control" >
	  </div>

      <div class="form-group">
	    <label>ID Detail</label>
	    <input type="text" name="id_detail" class="form-control" placeholder="ID Detail">
	  </div>
	  
      <div class="form-group">
	    <label>ID Produk</label>
	    <input type="text" name="id_produk" class="form-control" placeholder="ID Produk">
	  </div>
	  <div class="form-group">
	    <label>Jumlah Produk</label>
	    <input type="number" name="jumlah_produk" class="form-control" placeholder="Jumlah Produk">
	  </div>
	  

      <div class="form-group">
	    <label>Harga Produk</label>
	    <input type="number" name="total_harga" class="form-control" placeholder="Harga Produk">
	  </div>
      <div class="form-group">
	    <label>SubTotal Produk</label>
	    <input type="number" name="subtotal" class="form-control" >
	  </div>
  	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
  	<a href="penjualan.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
</body>
</html>