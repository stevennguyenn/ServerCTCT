<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	include("C:\\xampp\htdocs\CTCT\book\book.php");
	
	$key = $_POST['key'];

	$query = "SELECT id,name,ratio from giaitich2 where name like '%$key%'";
	$data = mysqli_query($con,$query);

	if ($data){
		$listResult = array();
		while ($row = mysqli_fetch_assoc($data)){
			array_push($listResult, new Book($row['id'],$row['name'],$row['ratio']));
		}
		echo json_encode($listResult);
	}
?>