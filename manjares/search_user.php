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
			<div id="content-error">
				<div class ="searching">
					<p><label for = "search">Search: &nbsp;</label>
					<input type = "text" id = "search" name = "search" size ="30" maxlength="40" value = "<?php if(isset($_POST['search'])) echo htmlspecialchars($_POST['search']); ?>">
					</p>
				</div>
			</div>
		</div>
		<?php include('footer.php');?>
	</body>
</html>