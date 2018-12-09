<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "top.php";

	$test_code = $_POST['test_code'];

	$query = "SELECT t1.id,t1.fullname, t2.point FROM account t1
			  inner join studenttest t2
			  using (id)
              where test_code =  '$test_code'
              order by point desc"; 
    $data = mysqli_query($con,$query);
    if($data){
    	$result = array();
    	while ($row = mysqli_fetch_assoc($data)){
    		array_push($result, new Top($row['id'],$row['fullname'],$row['point']));
    	}
    	echo json_encode($result);
    	return;
    }
    echo "Failed";
?>