<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "question.php";
	require "model_question.php";

	$id = $_POST['id'];

	$query = "SELECT * FROM question_giaitich1 WHERE test_code = (SELECT test_code FROM test where test_status = 1 AND test_code LIKE 'GT1\_%' LIMIT 1) AND test_code NOT IN (SELECT test_code from studenttest where id = '$id')";
	$data = mysqli_query($con,$query); 
	$listQuestion = array();
	$testcode = "";
	$result = null;
	if ($data){
		while ($row = mysqli_fetch_assoc($data)){
			$testcode = $row['test_code'];
			array_push($listQuestion, new Question($row['id'],$row['content_question'],$row['question_a'],$row['question_b'],$row['question_c'],$row['question_d']));
		}
		$result = new ModelQuestion($testcode,$listQuestion);
		echo json_encode($result);
		return;
	}
	echo "Failed";
?>