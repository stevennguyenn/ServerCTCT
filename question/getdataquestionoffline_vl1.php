<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "question.php";

	$test_code = $_POST['test_code'];

	$query = "SELECT * FROM question_vatly1 WHERE test_code = '$test_code'";
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