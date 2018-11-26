<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	include("C:\\xampp\htdocs\CTCT\book\bookseeall.php");

	$page = $_POST['page'];
	$pageNumber = 4;
	$listVatLy1 = array();
	if ((int)$page <= $pageNumber){
		$start = (int)$page*20;
		$query = "SELECT * from vatly1 LIMIT $start,20";
		$data = mysqli_query($con,$query);
		if ($data){
			while ($row = mysqli_fetch_assoc($data)){
				array_push($listVatLy1, new FullBook($row['id'],$row['name'],$row['author'],$row['dateupload'],$row['ratio']));
			}
			if (count($listVatLy1)>0){
				echo json_encode($listVatLy1);
			}
		}
		return;
	}
	echo json_encode($listVatLy1);
?>