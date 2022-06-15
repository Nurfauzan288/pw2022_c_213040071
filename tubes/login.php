<?php
require 'koneksi.php';
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>login</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
     <style>
         h1{
             margin-top: 10%;
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
    <center><h1>HALAMAN LOGIN</h1></center>
    
    <center><div class="echo">
          <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
    </div></center>
    <div class="isi">
  <center>
 	<form method="post" action="cek_login.php">
 		<label>USERNAME :</label>
 		<input type="text" name="username" id="username"  placeholder="Masukkan username"><br>
 		<label>PASSWORD :</label>
 		<input type="password" name="password" id="password"  placeholder="Masukkan password"><br>
 		<button type="submit" name="submit" id="submit">LOGIN</button>
 	</form></center>
 </div>
 </body>
 </html>