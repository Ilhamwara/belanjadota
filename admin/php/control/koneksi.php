<?php 

	$username 	= 'u982939190_root';
	$server 	= 'mysql.idhostinger.com';
	$pass		= 'ika1234';
	$db			= 'u982939190_ika';

	$conn = mysql_connect($server,$username,$pass);
	$conn_db = mysql_select_db($db);
 ?>