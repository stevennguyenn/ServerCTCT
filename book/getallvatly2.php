<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	include("bookseeall.php");

	$query = "SELECT * from vatly2 LIMIT 0,20";
	$data = mysqli_query($con,$query);

	if ($data){
		$listVatLy2 = array();
		while ($row = mysqli_fetch_assoc($data)){
			array_push($listVatLy2, new FullBook($row['id'],$row['name'],$row['author'],$row['dateupload'],$row['ratio']));
		}

		if (count($listVatLy2)>0){
			echo json_encode($listVatLy2);
		}
	}
?>