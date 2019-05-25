<?php

include "koneksi.php";

$name = $_POST['name'];

$query = "INSERT INTO users(name) VALUES('$name')";
$sql = mysqli_query($koneksi,$query);

if($sql){
    header("location:index.php");
}else{
    echo"Gagal. Coba kembali.";
}

?>
