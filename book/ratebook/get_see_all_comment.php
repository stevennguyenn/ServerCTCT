<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "C:\\xampp\htdocs\CTCT\book\bookdetail\comment.php";

	$page = $_POST['page'];
	$id_book = $_POST['id_book'];


	$pageNumber = 10;
	class CommentSeeAll{
		function CommentSeeAll($message,$list_comment){
			$this ->message = $message;
			$this ->list_comment = $list_comment;
		}
	}
	
	if ((int)$page <= $pageNumber){
		$start = (int)$page*4;
		$query = "SELECT * from account inner join (SELECT * FROM USER_RATE_BOOK 
		 			   WHERE id_book = '$id_book'
		 	           ORDER BY ratio desc
		 	           LIMIT $start,4) t2
         	           on id = t2.id_user";

		$list_comment = array();
		$data = mysqli_query($con,$query);
		if ($data){
			while ($row = mysqli_fetch_assoc($data)){
				array_push($list_comment, new Comment($row['id_user'],$row['avatar'],
				       $row['fullname'],$row['ratio'],$row['contentcomment']));
			}
			if (count($list_comment) > 0){
				echo json_encode(new CommentSeeAll("Successed",$list_comment));
				return;
			}
			echo json_encode(new CommentSeeAll("No Data",null));
			return;
		}
		echo json_encode(new ResultGetAll("Failed",null));
		return;
	} 
	echo json_encode(new CommentSeeAll("No Data",null));
?>