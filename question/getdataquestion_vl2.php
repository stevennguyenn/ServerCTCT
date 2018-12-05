<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "question.php";

	$query = "SELECT * FROM question_vatly2";
	$data = mysqli_query($con,$query);
	$question = array();
	if ($data){
		while ($row = mysqli_fetch_assoc($data)){
			array_push($question, new Question($row['id'],$row['content_question'],$row['question_a'],$row['question_b'],$row['question_c'],$row['question_d']));
		}
		if (count($question) > 0) {
			echo json_encode($question);
			return;
		}
	}
	echo "Failed";
?>