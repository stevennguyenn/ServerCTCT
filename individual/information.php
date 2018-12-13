<?php
	class Information{
		var $fullname;
		var $avatar;
		var $school;
		var $live;
		var $tested;

		function Information($fullname,$avatar,$school,$live){
			$this ->fullname = $fullname;
			$this ->avatar = $avatar;
			$this ->school = $school;
			$this ->live = $live;
		}

		function setTested($tested){
			$this ->tested = $tested;
		}
	}
?>