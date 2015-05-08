<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
	//Check to see if score is set
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}
	
	if($_POST){
		$number = $_POST['number'];		//passed from the question sheet <choice> type
		$selected_choice = $_POST['choice']; //passed from the question sheet <choice> type
		$next = $number+1;
		
		/* Test whether the information is correctly being processed
		echo $number. '<br>';
		echo $selected_choice;
		*/
		
		/*
		*	Get Total Questions
		*/
		$query = "SELECT * FROM `questions`";
		//Get result
		$results = $mysqli->query($query) or die($mysqli->error.___LINE___);
		$total = $results->num_rows;
		
		/*
		*	Get The Correct Choice
		*/
		//Create and run query, and put result in a variable
		$query = "SELECT * FROM `choices` 
				WHERE question_number = $number AND is_correct = 1";		
		//Get result
		$result = $mysqli->query($query) or die($mysqli->error.___LINE___);
		//Get row
		$row = $result->fetch_assoc();
		//Set correct choice
		$correct_choice = $row['id'];
		
		//Compare
		if($correct_choice == $selected_choice){
			//Answer is correct
			$_SESSION['score']++;
		}	
		
		//Exit on last question, or move to the next question
		if($number == $total){
			header("Location: final.php");
			exit();
		}else{
			header("Location: question.php?n=".$next);
		}
		
		}
		