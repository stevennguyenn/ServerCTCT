<?php
	class ModelQuestion{
		function ModelQuestion($test_code,$list_question){
			$this ->test_code = $test_code;
			$this ->list_question = $list_question;
		}
	}

	function setListQuestion($list_question){
		$this ->list_question = $list_question;
	}
?>