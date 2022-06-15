<?php 

require_once 'koneksi.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $result=mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
    $row=mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $nama_produk=$_POST['nama_produk'];
        $jumlah_produk=$_POST['jumlah_produk'];
        $harga=$_POST['harga'];
        
        mysqli_query($conn, "UPDATE produk SET id=$id, nama_produk=$nama_produk, jumlah_produk=$jumlah_produk, harga=$harga WHERE id=$id");
        if(mysqli_affected_rows($conn)){
            header('Location: product.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
   
</head>
<body>


    <div class="form">
        <?php if(isset($_GET['id'])): ?>
        <form action="" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <label for="nama_produk"> nama barang</label>
                <input type="text" name="nama_produk" id="nama_produk" value="<?= $row['nama_produk'] ?>" autocomplete="off"><br>
                <label for="jumlah_produk">jumlah barang</label>
                <input type="text" name="jumlah_produk" id="jumlah_produk" value="<?= $row['jumlah_produk'] ?>"><br>
                <label for="harga">harga</label>
                <input type="text" name="harga" id="harga" value="<?= $row['harga'] ?>"><br>
                <button type="submit" name="submit">Submit</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>