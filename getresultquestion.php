<?php

	require "connect.php";

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

	class IDandRESULT{	
		function IDandRESULT($id,$result){
			$this ->id = $id;
			$this ->result = $result;
		}

		function getID(){
			return $this ->id;
		}

		function getResult(){
			return $this ->result;
		}
	}
	$query = "SELECT id,result from question WHERE id IN $arridString";
	$data = mysqli_query($con,$query);
	$countPoint = 0;
	if ($data){
		while ($row = mysqli_fetch_assoc($data)){
			array_push($arrid_result, new IDandRESULT($row['id'],$row['result']));
		}
		for ($i = 0; $i < count($arrid_result); $i++){
			if (strcmp($arrresult[$i], $arrid_result[$i]->getResult()) == 0){
				$countPoint++;
			}
		}
		echo $countPoint;
		return;
	}
	echo "Failed";
?>
