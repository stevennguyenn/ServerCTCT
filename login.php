<?php

	header('Content-Type: text/html; charset=utf-8');
	require "connect.php";

	// $account = $_POST['account'];
	// $password = $_POST['password'];
	$account = 'chaunguyen4297';
	$password = '123456789';
	
	class Student {
		function Student($id,$fullname,$account,$password,$avatar){
			$this ->id = $id;
			$this ->fullname = $fullname;
			$this ->account = $account;
			$this ->password = $password;
			$this ->avatar = $avatar;
		}
	}

	$student = Null;
	$query_accout = "SELECT * FROM account where account = '$account' and password = '$password'";
	$data = mysqli_query($con,$query_accout);
	if ($data){
		while ($row = mysqli_fetch_assoc($data)) {
			$student = new Student($row['id'],$row['fullname'],$row['account'],$row['password'],$row['avatar']);
		}
		if ($student != Null){
			echo json_encode($student);
			return;
		}
		echo json_encode($student);
	return;
	}
	echo "Connect failed";

?>