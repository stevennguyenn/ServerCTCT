<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "section.php";

	$query = "SELECT test_code,name,number_test FROM test where test_code like 'VL1\_%'";


	$data = mysqli_query($con,$query);

	if ($data){
		$result = array();
		while ($row = mysqli_fetch_assoc($data)){
			$temp = new Section($row['test_code'],$row['name'],$row['number_test']);
			array_push($result, $temp);
		}
		if (count($result) > 0){
			echo json_encode($result);
			return;
		}
	}
	echo "Failed";
?>