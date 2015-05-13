<?php include 'database.php'?>
<?php
/*
*Get Total Questions
*/
$query  = "SELECT * FROM questions";
//Get results
$results =$mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>PHP Quizzer</title>
		<link rel="stylesheet" href="css/style.css" type="text"/>
	</head>
	<body>
		<head> 
			<div class="container"> 	
				<h1> PHP QUIZZER</h1>
			</div>
		</header>

		<main>
			<div class="container">
				<h2>Test Your PHP Knowledge!</h2>
				<p>This is a multiple choice quiz because knowledge can be tested</p>
				<ul>
					<li>
						<strong> Number of Questions</strong> <?php echo $total;?></li>
					<li>
						<strong> Type</strong> Multiple Choice</li>
					<li>
						<strong> Estimate Time: </strong> <?php echo $total * 0.5 ?> Minutes</li>
				</ul>
				<a href="question.php?n=1" class="start">Start Quiz</a>
			</div>
		</main>
		<footer>
			<div class="container">
				Copyright &copy; 2014, PHP Quizzer
			</div>
		</footer>
	</body>
</html>