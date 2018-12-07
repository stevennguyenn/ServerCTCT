<?php
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
?>