<?php
	class InformationProfile{
		function InformationProfile($fullname,$avatar,$school,$live,$likes,$follows){
			$this ->fullname = $fullname;
			$this ->avatar = $avatar;
			$this ->school = $school;
			$this ->live = $live;
			$this ->likes = $likes;
			$this ->follows = $follows;
		}
	}
?>