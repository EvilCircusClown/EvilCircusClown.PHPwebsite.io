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
			<div class= "changing-pass">
					<h2 class = "change-pass">Edit Password</h2>
						<form action="change-pass-members.php" method=post>
						<p><label for = "psword1">New Password: &nbsp;</label>
							<input type = "password" id = "psword" name = "psword1" size ="20" maxlength="40" value = "<?php if(isset($_POST['psword1'])) echo $_POST['psword1'] ?>">
							</p>

							<p><label for = "psword2"> Confirm New Password: &nbsp;</label>
							<input type = "password" id = "psword" name = "psword2" size ="20" maxlength="40" value = "<?php if(isset($_POST['psword2'])) echo $_POST['psword2'] ?>">
							</p>
							<p class = "button"><input type = "submit" id = "submit" name = "submit" value = "Edit"></p>
						</form>
				</div>
		</div>
		<?php include('footer.php');?>
	</body>
</html>