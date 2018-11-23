<?php

	require "connect.php";

	$id = $_POST["id"];

	class ContentHeader{
		function ContentHeader($fullname,$avatar,$points){
			$this->fullname = $fullname;
			$this->avatar = $avatar;
			$this->points = $points." points";
		}
	}

	$query = "SELECT fullname,avatar,points from account where id = $id";
	$data = mysqli_query($con,$query);

	if ($data){

		$result = null;

		while ($row = mysqli_fetch_assoc($data)){
			$result = new ContentHeader($row['fullname'],$row['avatar'],$row['points']);
		}

		if ($result != null){
			echo json_encode($result);
		}
	}
?>