<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "questiontested.php";

	// $id_user = $_POST['id_user'];
	// $id_test = $_POST['id_test'];
	$id_user = '31';
	$id_test = 'GT1_1003';
	
	$query_get_user_chocie = "SELECT t1.content_question,t1.question_a,t1.question_b,t1.question_c,t1.question_d,t1.result,t1.result_image,t2.value 
							  FROM question_giaitich1 t1
							  INNER JOIN value_question_user_gt1 t2
							  ON t1.id = t2.id_question
                              WHERE t2.id_user = '$id_user' AND t1.test_code = '$id_test'";
	$data = mysqli_query($con,$query_get_user_chocie);

	if ($data){
		$result = array();
		while ($row = mysqli_fetch_assoc($data)){
			$temp = new QuestionTested($row['content_question'],$row['question_a'],$row['question_b'],$row['question_c'],$row['question_d'],$row['result'],$row['result_image'],$row['value']);
			array_push($result, $temp);
		}
		echo json_encode($result);
		return;
	}
	echo "Failed";

?>