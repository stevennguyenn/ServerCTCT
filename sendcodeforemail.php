<?php
$to      = 'chaunguyen4297@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: kutega9e421997@gmail.com' . "\r\n" .
    'Reply-To: kutega9e421997@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)){
	echo "Successed";
	return;
}
echo "Failed";

?>