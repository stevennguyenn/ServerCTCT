<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "tested.php";

	$id = $_POST['id'];
	$query = "SELECT test.test_code,studenttest.point,test.name,test.number_test 
			  FROM studenttest 
			  LEFT JOIN test using(test_code)
			  WHERE test_code LIKE 'VL1\_%' AND id = '$id'";

	$data = mysqli_query($con,$query);
	if ($data){
		$result = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$temp = $row['test_code'];
			$query_get_rate = "SELECT get_rate($id,'$temp') as get_rate";
			$get_rate = mysqli_query($con,$query_get_rate);
			if ($get_rate){
				$rate = mysqli_fetch_assoc($get_rate)['get_rate'];
				array_push($result, new Tested($row['test_code'],$row['point'],$rate,$row['name'],$row['number_test']));
			}
		}
		if (count($result) >= 0 ){
			echo json_encode($result);
			return;
		}
		echo "Null";
		return;
	}
	echo "Failed";
?>