<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "title.php";

	$query = "SELECT test_code,name,number_test from test where test_status = 0 and test_code like 'GT1\_%'";
	$data  = mysqli_query($con,$query);

	if ($data){
		$result = array();
		while ($row = mysqli_fetch_assoc($data)){
			array_push($result, new Title($row['test_code'],$row['name'],$row['number_test']));
		}

		if (count($result) > 0){
			echo json_encode($result);
			return;
		}
	}
	echo "Failed";
?>