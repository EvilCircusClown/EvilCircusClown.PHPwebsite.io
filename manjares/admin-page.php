<?php 
	session_start();
    if(!isset($_SESSION['user_level'])){ 
		header("Location: login-page.php");
		exit();
    }elseif($_SESSION['user_level'] !=1){ 
		header("Location: member-page.php");
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
		<?php include('header-admin.php');?>
		<?php include('nav-admin.php');?>
		<?php include('info-col.php');?>
			<div id="content">
			<h2>Dashboard</h2>
			<img src="https://media1.tenor.com/m/L7TS4yqHGJsAAAAd/nokotan-noko.gif" alt ="Dashboard"></img>
			</div>
		</div>
		<?php include('footer.php');?>
	</body>
</html>