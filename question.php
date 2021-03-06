<?php include 'database.php'; ?>
<?php session_start(); ?> 
<?php
	//Set question number
	$number = (int)$_GET['n'];

	/*
	*	Get Total Question
	*/
		$query = "SELECT * FROM `questions`";
		//Get result
		$results = $mysqli->query($query) or die($mysqli->error.___LINE___);
		$total = $results->num_rows;
	
	/*
	*	Get Questions by number
	*/
	$query = "SELECT * FROM questions
			WHERE question_number = $number";
	//Get result
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$question = $result->fetch_assoc(); //associative array with data requested
	
	/*
	*Get choices
	*/
	$query = "SELECT * FROM choices
			WHERE question_number = $number";		
	//Get result
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
	?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>PHP Quizzer</title>
		<link rel="stylesheet" href="css/style.css" type="text/css"/>
	</head>
	<body>
		<head> 
			<div class="container"> 	
				<h1> PHP QUIZZER</h1>
			</div>
		</header>
		<main>
			<div class="container">
				<div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?> </div>
				<p class="question">
					<?php echo $question['text']; ?>
				</p>
				<form method="post" action="process.php"> <!--Send a form by post to the file process.php -->
					<ul class="choices">
						<?php while($row = $choices -> fetch_assoc()) : ?>
							<li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text']?></li>			
						<?php endwhile; ?>
					</ul>	
					<input type = "submit" value="Submit" />
					<input type ="hidden" name="number" value="<?php echo $number; ?>" />
				</form>
			</div>
		</main>
		
		<footer>
			<div class="container">
				Copyright &copy; 2014, PHP Quizzer
			</div>
		</footer>
	</body>

</html>