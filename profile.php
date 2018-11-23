<?php
	require "connect.php";

	$id = $_POST['id'];

	$query = "SELECT fullname,avatar FROM account where id = $id";
	$data  = mysqli_query($con,$query);

	class Profile{
		var $fullname;
		var $avatar;

		function Profile($fullname,$avatar){
			$this ->fullname = $fullname;
			$this ->avatar = $avatar;
		}

		function getFullName(){
			return $this ->fullname;
		}
	}

	$profile = null;

	if ($data){
		while ($row = mysqli_fetch_assoc($data)) {
			$profile = new Profile($row['fullname'],$row['avatar']);
		}
		if ($profile != null){
			echo json_encode($profile);
			return;
		}
		echo "Access diened";
		return;
	}
	echo "Access diened";
?>