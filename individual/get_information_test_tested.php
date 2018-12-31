<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "point_name_course.php";


	$id = '31';
	$query = "SELECT * from studenttest 
				inner join test
            	using(test_code)
            	where id = '$id'";
    $data = mysqli_query($con,$query);

    if ($data){
    	$result = array();
    	while ($row = mysqli_fetch_assoc($data)){
    		array_push($result, new Point_Name_Course($row['point'],$row['name']));
    	}
    	echo json_encode($result);
    	return;
    }
    echo "Failed";
?>