<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";

	$id_user = $_POST['id_user'];
	$id_book = $_POST['id_book'];
	$contentcomment = $_POST['contentcomment'];
	$ratio = $_POST['ratio'];

	$query = "INSERT INTO user_rate_book(id,id_book,contentcomment,ratio) VALUES ('$id_user','$id_book','$contentcomment','$ratio')";
	$data = mysqli_query($con,$query);
	if ($data){
		echo "Successed";
		return;
	}
	echo "Failed";
?>