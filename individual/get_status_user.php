<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "status.php";
	require "respone.php";


	$id = '31';

	$query = "SELECT * from status_user Where id = '$id'";

	$data = mysqli_query($con,$query);

	if ($data){
		$result = array();
		while ($row = mysqli_fetch_assoc($data)){
			array_push($result, new Status($row['dateupload'],$row['contentstatus'],$row['imgstatus']));
		}
		echo json_encode(new Respone("Successed",$result));
		return;
	}
	echo json_encode(new Respone("Failed",NULL));
?>