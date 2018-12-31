<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "C:\\xampp\htdocs\CTCT\book\bookdetail\comment.php";

	$rate = $_POST['rate'];
	$id_book = $_POST['id_book'];


	$query = 	"SELECT * from account inner join (SELECT * FROM USER_RATE_BOOK 
		 			   WHERE id_book = '$id_book'
		 	           ORDER BY ratio desc) t2
         	           on id = t2.id_user where ratio > $rate - 1  and  ratio <= $rate";
    $data = mysqli_query($con,$query);
    if ($data){
    	$result = array();
    	while ($row = mysqli_fetch_assoc($data)){
    		array_push($result, new Comment($row['id_user'],$row['avatar'],
				       $row['fullname'],$row['ratio'],$row['contentcomment']));
    	}
    	echo json_encode($result);
    	return;
    }
    echo "Failed";
?>