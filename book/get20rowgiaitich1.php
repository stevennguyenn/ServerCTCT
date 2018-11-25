<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	include("book.php");

	$query = "SELECT * from giaitich1 LIMIT 0,20";
	$data = mysqli_query($con,$query);

	if ($data){
		$listGiaitich1 = array();
		while ($row = mysqli_fetch_assoc($data)){
			array_push($listGiaitich1, new Book($row['id'],$row['name'],$row['ratio']));
		}

		if (count($listGiaitich1)>0){
			echo json_encode($listGiaitich1);
		}
	}
?>