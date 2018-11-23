<?php
	require "connect.php";

	$id = $_POST['id'];
	$code = $_POST['code'];

	$query = "SELECT * FROM account WHERE id = $id AND code_ctct = $code";
	$data = mysqli_query($con,$query);
	if ($data) {
		$row = mysqli_fetch_assoc($data);
		if ($row != null){
			echo "successed";
			return;
		}
	}
	echo "failed";
?>