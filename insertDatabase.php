<?php
	require "connect.php";
	
	$fullname = $_POST['fullname'];
	$account = $_POST['account'];
	$password = $_POST['password'];
	$avatar = $_POST['avatar'];

	if (strlen($fullname) == 0){
		echo "No full name";
		return;
	}

	if (strlen($account) ==0){
		echo "No Account";
		return;
	} 

	if (strlen($password) == 0){
		echo "No password";
		return;
	}

	if (strlen($avatar) == 0){
		echo "No Avatar";
		return;
	}

	$query = "INSERT INTO account VALUES (null,'$fullname','$account','$password','$avatar')";
	$data = mysqli_query($con,$query);

	if ($data){
		echo "Success";
	} else {
		echo "Failed";
	}
?>