<?php session_start(); ?>

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
				<h2>You're Complete </h2>
				<p>Congratulations on completing the test, you are now a Zen Master</p>
				<p>Final Score: <?php echo $_SESSION['score']; ?></p>
				<a href="question.php?n=1" class="start">Take again </a>
			</div>
		</main>
		<footer>
			<div class="container">
				Copyright &copy; 2014, PHP Quizzer
			</div>
		</footer>
	</body>
</html>
<?php session_destroy(); ?>