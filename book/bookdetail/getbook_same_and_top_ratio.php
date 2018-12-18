<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "C:\\xampp\htdocs\CTCT\book\book.php";

	$key_word = $_POST['key_word'];

	class Result{
		function Result($array_book_same,$array_book_ratio){
			$this ->array_book_same = $array_book_same;
			$this ->array_book_ratio = $array_book_ratio;
		}
	}

	$query_get_top_ratio = "CALL getBookSameAndTopRatio('$key_word')";
	$data = mysqli_query($con,$query_get_top_ratio);
	
	if ($data){
		$array_book_same = array();
		$array_book_ratio = array();
		$index = 0;

		while ($row = mysqli_fetch_assoc($data)){
			$temp = new Book($row['id'],$row['name_document'],$row['ratio']); 
			if ($index < 10){
				array_push($array_book_ratio, $temp);
				$index += 1;
				continue;
			}
			array_push($array_book_same, $temp);
			$index += 1;
		}
		echo json_encode(new Result($array_book_ratio,$array_book_same));
		return;
	}
	echo "Failed";
?>