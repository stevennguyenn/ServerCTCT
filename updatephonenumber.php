<?php

	require "connect.php";

	// $id = $_POST['id'];
	// $phoneNumber = $_POST['phonenumber'];
	$id = '31';
	$phoneNumber = '0961046493';
	$query = "UPDATE account SET phone_number = $phoneNumber where id = $id";
	$data = mysqli_query($con,$query);

	if ($data){
		echo "Successed";
		return;
	}	
	echo "Failed";
?>