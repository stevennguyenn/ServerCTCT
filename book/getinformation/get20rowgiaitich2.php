<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	include("C:\\xampp\htdocs\CTCT\book\book.php");

	$query = "SELECT id,name_document,ratio from reference_document where id like 'GT2%' LIMIT 0,20";
	$data = mysqli_query($con,$query);

	if ($data){
		$result = array();
		while ($row = mysqli_fetch_assoc($data)){
			array_push($result, new Book($row['id'],$row['name_document'],round($row['ratio']*10)/10));
		}
		echo json_encode($result);
		return;
	}
	echo "Failed";
?>