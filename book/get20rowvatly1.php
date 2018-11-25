<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	include("book.php");

	$query = "SELECT * from vatly1 LIMIT 0,20";
	$data = mysqli_query($con,$query);

	if ($data){
		$listvatly1 = array();
		while ($row = mysqli_fetch_assoc($data)){
			array_push($listvatly1, new Book($row['id'],$row['name'],$row['ratio']));
		}

		if (count($listvatly1)>0){
			echo json_encode($listvatly1);
		}
	}
?>