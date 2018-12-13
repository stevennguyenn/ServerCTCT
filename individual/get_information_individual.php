<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "information.php";
	require "point_name_course.php";

	$id = $_POST['id'];

	$query = "SELECT * FROM account
					   INNER JOIN studenttest
					   USING(id)
        			   INNER JOIN test 
                       using(test_code)
                       WHERE id = '$id'";
	$data = mysqli_query($con,$query);



	if ($data) {
		$result = NULL;
		$list = array();
		while ($row = mysqli_fetch_assoc($data)){
			$result = new Information($row['fullname'],$row['avatar'],$row['school'],$row['live']);
			array_push($list, new Point_Name_Course($row['point'],$row['name']));
		}
		
		$result->setTested($list);
		echo json_encode($result);

		return;
	}
	echo "Failed";
?>