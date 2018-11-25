<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	include("book.php");

	$query = "SELECT * from giaitich2 LIMIT 0,20";
	$data = mysqli_query($con,$query);

	if ($data){
		$listGiaitich2 = array();
		while ($row = mysqli_fetch_assoc($data)){
			array_push($listGiaitich2, new Book($row['id'],$row['name'],$row['ratio']));
		}

		if (count($listGiaitich2)>0){
			echo json_encode($listGiaitich2);
		}
	}
?>