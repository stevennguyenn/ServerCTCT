<?php
	class QuestionTested{
		function QuestionTested($content_question,$question_a,$question_b,$question_c,$question_d,$result,$image_result,$value_user_choice){
			$this ->content_question = $content_question;
			$this ->question_a = $question_a;
			$this ->question_b = $question_b;
			$this ->question_c = $question_c;
			$this ->question_d = $question_d;
			$this ->result = $result;
			if ($image_result != null){
				$this ->image_result = $image_result;
			} else {
				$this ->image_result = "";
			}
			
			if ($value_user_choice != null){
				$this ->value_user_choice = $value_user_choice;
			} else {
				$this ->value_user_choice = "";
			}
			
		}
	}

?>