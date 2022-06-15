<?php 

require_once 'koneksi.php';


if(isset($_GET['id'])){
    $id=$_GET['id'];
    mysqli_query($conn, "DELETE FROM produk WHERE id=$id");
    if(mysqli_affected_rows($conn)){
        header('Location: product.php');
    }
}

?>