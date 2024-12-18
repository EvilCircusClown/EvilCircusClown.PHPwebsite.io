<?php 
	session_start();
	if(!isset($_SESSION['user_level'])){ 
		header("Location: login-page.php");
		exit();
	}
?>
<!doctype html>
<html lang=en>
	<head>
		<title>Website ni Manjares</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="css2/includes.css">
	</head>
	<body>
		<div id="container">
		<?php include('header-members.php');?>
		<?php include('nav-members.php');?>
		<?php include('info-col.php');?>
			<div id="content-error">
				<div class="errors">
				<h2>Are you sure you want to logout</h2>
				<p><a href="logout.php" id="return-home">Yes</a><a href="member-page.php" id="return-home">No</a></p>
				</div>
				<img src= "https://media1.tenor.com/m/Klo5zvndUHEAAAAd/shikanoko-nokonoko-koshitan-nokotan.gif"
				alt = "Goodbye"></img>
			</div>
		</div>
		<?php include('footer.php');?>
	</body>
</html>