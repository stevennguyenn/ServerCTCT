<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	include("C:\\xampp\htdocs\CTCT\book\bookseeall.php");

	$page = $_POST['page'];
	$pageNumber = 4;
	$listGiaitich2 = array();
	if ((int)$page <= $pageNumber){
		$start = (int)$page*20;
		$query = "SELECT * from giaitich2 LIMIT $start,20";
		$data = mysqli_query($con,$query);
		if ($data){
			while ($row = mysqli_fetch_assoc($data)){
				array_push($listGiaitich2, new FullBook($row['id'],$row['name'],$row['author'],$row['dateupload'],$row['ratio']));
			}
			if (count($listGiaitich2)>0){
				echo json_encode($listGiaitich2);
			}
		}
		return;
	}
	echo json_encode($listGiaitich2);
?>