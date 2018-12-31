<?php
	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "rate_num.php";
	require "detail_rate_num.php";
	require "tit_comment_see_all.php";

	// $id_book = $_POST['id_book'];

	$id_book = "GT1_10104";

	$query = "SELECT t1.ratio as avg_ratio,t1.number_rate, t2.ratio FROM reference_document t1 inner join user_rate_book t2 on id = id_book
		where id = '$id_book'";

	$data = mysqli_query($con,$query);

	if ($data){
		$rate_num = null;
		$detail_rate_num = null;
		$ratio5 = 0;
		$ratio4 = 0;
		$ratio3 = 0;
		$ratio2 = 0;
		$ratio1 = 0;
		$sum_number = 0;
		while ($row = mysqli_fetch_assoc($data)){
			$rate_num = new RateNum($row['avg_ratio'],$row['number_rate']);
			$sum_number = $row['number_rate'];
			if ($row['ratio'] > 4){
				$ratio5 = $ratio5 + 1;
				continue;
			}

			if ($row['ratio'] > 3){
				$ratio4 = $ratio4 + 1;
				continue;
			}

			if ($row['ratio'] > 2){
				$ratio3 = $ratio3 + 1;
				continue;
			}

			if ($row['ratio'] > 1){
				$ratio2 = $ratio2 + 1;
				continue;
			}

			if ($row['ratio'] > 0){
				$ratio1= $ratio1 + 1;
				continue;
			}
		}
		$detail_rate_num = new DetailRateNum(round($ratio5/$sum_number*10)*10,round($ratio4/$sum_number*10)*10,round($ratio3/$sum_number*10)*10,round($ratio2/$sum_number*10)*10,round($ratio1/$sum_number*10)*10);
		echo json_encode(new TitleSeeAllComment($rate_num,$detail_rate_num));
		return;
	}
	echo "Failed";
?>