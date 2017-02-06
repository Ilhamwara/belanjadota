<?php 

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['add'])) {

	$show = mysql_query("SELECT * FROM admin WHERE username='$username'");
	$cek  = mysql_fetch_array($show);
	$username1 = $cek['username'];
	if (($username) !== ($username1)) {
		
		$query_add = mysql_query("INSERT INTO admin VALUES('','$username','$password')");
		header("Location:../../main.php?page=admin-control");
		
	}
	elseif ($username == $username1) {
		echo "nama admin sama";
	}

}
elseif (isset($_POST['updet'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (isset($_GET['key'])) {

		$show = mysql_query("SELECT * FROM admin WHERE username='$username'");
		$cek  = mysql_fetch_array($show);
		$username1 = $cek['username'];
		$id_admin = $_GET['key'];

		if (($username) !== ($username1)) {

			$query_updet = mysql_query("UPDATE admin SET username='$username', password='$password' WHERE id='$id_admin'");
			header("Location:../../main.php?page=admin-control"); 
		}
		elseif ($username == $username1) {
			echo "nama admin sama";
		}
		else{
			echo "gagal";
		}

	}
}


	?>