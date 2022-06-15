<?php 

require_once 'koneksi.php';

if(isset($_POST['submit'])){
    $nama_produk=$_POST['nama_produk'];
    $jumlah_produk=$_POST['jumlah_produk'];
    $harga=$_POST['harga'];
    
    mysqli_query($conn, "INSERT INTO produk VALUES(null, '$nama_produk', '$jumlah_produk', '$harga')");
}

$result=mysqli_query($conn, "SELECT * FROM produk");
$rows=[];

while($row=mysqli_fetch_assoc($result)){
    $rows[]=$row;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .isi{
            display: flex;
            margin-top:10%;
            justify-content: space-between;
            padding-right: 10%;
            padding-left: 10%;
        }
        h3 {
            margin-top:10%;
        }

    </style>
   
</head>
<body>
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php"><b>HJ AMBI STORE</b></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php">HOME</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="product.php">PRODUCT</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">LOGIN</a>
  </li>
</ul>
<center><h3>BERIKUT ADALAH PRODUK EDUKASI ANAK</h3></center>
<div class="isi">
<?php foreach($rows as $row): ?>
<div class="card" style="width: 18rem;">
    <img src="img/<?= $row['gambar'] ?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?= $row['nama_produk'] ?></h5>
        <p class="card-text">stok tersedia = <?= $row['jumlah_produk'] ?></p>
        <p class="card-text">Rp. <?= $row['harga'] ?></p>
        <a href="#" class="btn btn-primary">Beli</a>
    </div>
</div>
<?php endforeach; ?>
</div>
</body>
</html>