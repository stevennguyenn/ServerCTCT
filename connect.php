<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$databasename = "accountctct";
	
	$con = mysqli_connect($hostname,$username,$password,$databasename);
	$con->set_charset('utf8');
?>