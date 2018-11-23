<?php
	require "connect.php";

	$code = '1510281';

	$query = "SELECT account.avatar, memberctct.nick_name FROM account INNER JOIN memberctct ON account.code_ctct = memberctct.code_ctct
	where memberctct.code_ctct = $code";

	$data = mysqli_query($con,$query);

	if ($data){
		echo "successed";
		return;
	}
	echo "failed";
?>