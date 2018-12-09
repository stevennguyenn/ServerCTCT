<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "question.php";

	$id = $_POST['id'];

	$query = "SELECT * FROM question_giaitich1 WHERE test_code IN (SELECT test_code FROM test where test_status = 1 AND test_code LIKE 'GT2\_%') AND test_code NOT IN (SELECT test_code from studenttest where id = '$id')";
	$data = mysqli_query($con,$query); 
	$result = array();
	if ($data){
		while ($row = mysqli_fetch_assoc($data)){
			array_push($result, new Question($row['id'],$row['content_question'],$row['question_a'],$row['question_b'],$row['question_c'],$row['question_d']));
		}
		if (count($result) >= 0) {
			echo json_encode($result);
			return;
		}
	}
	echo "Failed";
?>