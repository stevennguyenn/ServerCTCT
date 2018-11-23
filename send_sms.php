<?php
	$key = '568c36bf-9848-4bc0-8d2b-966cb0963d6e';
	$secrect = "cLL/zRLF5EWqFKLcL3rkow==";
	// $phoneNumber = $_POST['phonenumber'];
	$phonenumber = "+84961046493";
	$user = "application\\".$key.":".$secrect;
	$message = array("message"=>"Test");
	$data = json_encode($message);

	$ch = curl_init('https://messagingapi.sinch.com/v1/sms/' . $phonenumber);
	curl_setopt($ch, CURLOPT_POST, true);    
	curl_setopt($ch, CURLOPT_USERPWD,$user);    
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);    
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));    
	$result = curl_exec($ch);    
	if(curl_errno($ch)) {    
   		echo 'Curl error: ' . curl_error($ch);    
	} else {    
    	echo $result;    
	}   
	curl_close($ch);    
?>