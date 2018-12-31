<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "information_profile.php";

	$id = '31';
	$query = "SELECT * FROM account
	 					WHERE id = '$id'";

	$data = mysqli_query($con,$query);
	if ($data){
		$result = NULL;
		while ($row = mysqli_fetch_assoc($data)){
			$result = new InformationProfile($row['fullname'],$row['avatar'],$row['school'],$row['live'],$row['likes'],$row['follows']);
		}
		echo json_encode($result);
		return;
	}
	echo "Faield"
?>