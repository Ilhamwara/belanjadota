<?php 
include 'koneksi.php';
$id = $_POST['id'];
$query = mysql_query("UPDATE pemesanan SET status = '1' WHERE id ='$id'");
if ($query) {
	header('location:../main.php?page=pemesanan');
}


?>