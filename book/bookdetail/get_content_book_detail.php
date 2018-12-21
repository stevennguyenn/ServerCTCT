<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "title_book.php";
	require "information_book.php";
	require "get_title_comment.php";

	$id_book = $_POST['id_book'];

	class Result {
		function result($title_book,$information_book){
			$this ->title_book = $title_book;
			$this ->information_book = $information_book;
		}
	}

	$query = "SELECT * FROM reference_document 
			  WHERE id = '$id_book'";
	

	$data = mysqli_query($con,$query);

	

	if ($data ){
		$result_title_book  = null;
		$result_information_book = null; 
		$result_title_comment = null;
		while ($row = mysqli_fetch_assoc($data)){
			 $result_title_book = new TitleBook("",$row['name_document'],round($row['ratio']*10)/10);
			 $result_information_book = new InformationBook($row['author'],"",$row['content'],$row['dateupload']);
		}

		echo json_encode(new Result($result_title_book,$result_information_book));
		return;
	}
	echo "Failed"
?>