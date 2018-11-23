<?php
	require "connect.php";

	$id = $_POST['id'];
	$currentPassword = $_POST['currentPassword'];
	$newPassword = $_POST['newPassword'];

	$query1 = "SELECT count(*) as Count FROM account WHERE id = $id AND password = $currentPassword";
	$number = mysqli_query($con,$query1);
	if ($number){
		$result = null;
		while ($row = mysqli_fetch_assoc($number)){
			$result = (int) $row['Count'];
		}
		if ($result == null){
			echo "Current Passord Failed";
			return;
		}
		$query2 = "UPDATE account SET password = $newPassword WHERE id = $id";
		$data = mysqli_query($con,$query2);
		if ($data){
			echo "Successed";
		}
		return;
	}	
	echo "Connect Failed"
?>