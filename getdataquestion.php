<?php
	require "connect.php";

	class Question {
		function Question($id,$content_question,$question_a,$question_b,$question_c,$question_d) {
			$this ->id = $id;
			$this ->content_question = $content_question;
			$this ->question_a = $question_a;
			$this ->question_b = $question_b;
			$this ->question_c = $question_c;
			$this ->question_d = $question_d;
		}
	}

	$query = "SELECT * FROM question_giaitich1";
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