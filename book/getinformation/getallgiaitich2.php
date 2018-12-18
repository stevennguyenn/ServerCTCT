<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	include("C:\\xampp\htdocs\CTCT\book\bookseeall.php");
	require "result_get_all.php";

	$page = $_POST['page'];

	$pageNumber = 10;
	
	$result = array();
	if ((int)$page <= $pageNumber){
		$start = (int)$page*10;
		$query = "SELECT * from reference_document WHERE id like 'GT2%' LIMIT $start,10";
		$data = mysqli_query($con,$query);
		if ($data){
			while ($row = mysqli_fetch_assoc($data)){
				array_push($result, new FullBook($row['id'],$row['name_document'],$row['author'],$row['dateupload'],round($row['ratio']*10)/10));
			}
			if (count($result) > 0){
				echo json_encode(new ResultGetAll("Successed",$result));
				return;
			}
			echo json_encode(new ResultGetAll("No Data",null));
			return;
		}
		echo json_encode(new ResultGetAll("Failed",null));
		return;
	}
	echo json_encode(new ResultGetAll("No Data",null));
?>