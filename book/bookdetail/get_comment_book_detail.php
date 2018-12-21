<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "comment.php";
	require "full_comment.php";
	require "get_title_comment.php";

	// $id_book = $_POST["id_book"];
	$id_book = "GT1_10104";

	$query = "SELECT * from account inner join (SELECT * FROM USER_RATE_BOOK 
		 			   WHERE id_book = '$id_book'
		 	           ORDER BY ratio desc
		 	           LIMIT 0,4) t2
         	           on id = t2.id_user";

    $queryComment = "call getTitleComment('$id_book')";

	$data = mysqli_query($con,$query);

	$dataComment = mysqli_query($con,$queryComment);

	if ($data && $dataComment){
		$result = array();
		while ($row = mysqli_fetch_assoc($data)) {
			array_push($result, new Comment($row['id_user'],$row['avatar'],
				       $row['fullname'],$row['ratio'],$row['contentcomment']));
		}
		$rowComment = mysqli_fetch_assoc($dataComment);
		$result_title_comment = new TitleComment("Successed",round($rowComment['ratio'] * 10)/10,$rowComment['number_rate']);
		echo json_encode(new FullComment($result_title_comment,$result));
		return;
	}
	echo "Failed";

?>