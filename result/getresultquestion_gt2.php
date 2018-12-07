<?php

	require "C:\\xampp\htdocs\CTCT\connect.php";
	require "result.php";
	require "idandresult.php";

	$id = $_POST['id'];
	$arrid = $_POST['arrid'];
	$arrresult = $_POST['arrresult'];

	if (count($arrid) == 0){
		echo "Id null";
		return;
	}

	if (count($arrresult) == 0){
		echo "Result null";
		return;
	}

	//converse arrid -> arrstringid [] -> ()
	$arridString = "(";
	for ($i = 0;$i < count($arrid);$i++) {
		if ($i == 0){
			$arridString .= (String)$arrid[$i];
			continue;
		}
		$arridString .= (','.(String)$arrid[$i]);
	}

	$arridString .= ")";
	$arrid_result = array();

	$insert = "";

	for ($i = 0;$i < count($arrid);$i++) {
		if ($i != count($arrid) -1){
			$insert .= "(".$id.",".$arrid[$i].","."'".$arrresult[$i]."'"."),";
			continue;
		}
		$insert .= "(".$id.",".$arrid[$i].","."'".$arrresult[$i]."'".")";
	}

	$query_insert_temp = "INSERT into value_question_user_gt2 values $insert";
	$data_insert_value = mysqli_query($con,$query_insert_temp);

	if (!$data_insert_value){
		echo "Failed";
		return;
	}

	$query = "SELECT id,result,test_code from question_giaitich2 WHERE id IN $arridString";
	$data = mysqli_query($con,$query);
	$countPoint = 0;
	$ratio = 0;
	$test_code = null;
	if ($data){
		while ($row = mysqli_fetch_assoc($data)){
			array_push($arrid_result, new IDandRESULT($row['id'],$row['result']));
			$test_code = $row['test_code'];
		}
		for ($i = 0; $i < count($arrid_result); $i++){
			if (strcmp($arrresult[$i], $arrid_result[$i]->getResult()) == 0){
				$countPoint++;
			}
		}
		$ratio = $countPoint*5/10;
		$query_insert = "INSERT INTO studenttest(id,test_code,point) values ('$id','$test_code','$countPoint')";
		$insert = mysqli_query($con,$query_insert);
		if ($insert){
			$query_get_result = "SELECT point FROM studenttest WHERE test_code = '$test_code' order by point desc";
			$get_all_point = mysqli_query($con,$query_get_result);
			if ($get_all_point){
				$listpoint = array();
				while ($row = mysqli_fetch_assoc($get_all_point)) {
					array_push($listpoint, $row['point']);
				}
				if (count($listpoint) > 0){
					$index =  array_search($countPoint, $listpoint);
					if ($index >= 0){
						$rate = ($index+1)."/".count($listpoint);
						echo json_encode(new Result($countPoint,$ratio,$rate));
						return;
					}
					return;
				}
				return;
			}
			echo "Failed Get";
			return;
		}
		echo "Failed Insert";
		return;
	}
	echo "Failed";
?>
