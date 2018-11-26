<?php
	class FullBook{
		function FullBook($id,$name,$author,$dateupload,$ratio){
			$this->id = $id;
			$this->author = $author;
			$this->dateupload = $dateupload;
			$this->name = $name;
			$this->ratio = $ratio;
		}
	}
?>