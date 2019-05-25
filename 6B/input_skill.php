<?php

include "koneksi.php";

$id = $_POST['id'];
$name = $_POST['name'];


$query = "INSERT INTO skills(name,user_id) VALUES('$name',$id)";
$sql = mysqli_query($koneksi,$query);

if($sql){
    header("location:index.php");
}else{
    echo"Gagal. Coba kembali.";
}

?>
