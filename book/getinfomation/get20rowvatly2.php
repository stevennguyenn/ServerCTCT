<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	include("C:\\xampp\htdocs\CTCT\book\book.php");

	$query = "SELECT id,name,ratio from vatly2 LIMIT 0,20";
	$data = mysqli_query($con,$query);

	if ($data){
		$listvatly2 = array();
		while ($row = mysqli_fetch_assoc($data)){
			array_push($listvatly2, new Book($row['id'],$row['name'],$row['ratio']));
		}

		if (count($listvatly2)>0){
			echo json_encode($listvatly2);
		}
	}
?>