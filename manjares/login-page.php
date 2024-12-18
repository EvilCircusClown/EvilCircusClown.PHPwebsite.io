<!doctype html>
<html lang=en>
	<head>
		<title>Website ni Manjares</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="css2/includes.css">
	</head>
	<body>
		<div id="container">
		<?php include('header.php');?>
		<?php include('nav-index.php');?>
		<?php include('info-col.php');?>
			<div id="content-error">
				<?php 
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						require ('mysqli_connect.php');
						$errors = array();
						if(empty($_POST['email'])){
							$errors[] = 'Please enter your email.';
						}else{
							$e = trim($_POST['email']);
						}
						if(empty($_POST['psword'])){
							$errors[] = 'Please enter your email.';
						}else{
							$p = trim($_POST['psword']);
							$hp = sha1($p);
						}
						if(empty($errors)){
							require ('mysqli_connect.php');
							$q = "SELECT user_id, fname, user_level FROM users where(email = '$e' and psword = '$p' or email = '$e' and psword = '$hp');";
							$result = @mysqli_query ($dbcon, $q);
							if (@mysqli_num_rows($result) == 1) {
								session_start();
								$_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
								$_SESSION['user_level'] = (int) $_SESSION['user_level'];
								$url = ($_SESSION['user_level'] === 1) ? 'admin-page.php' : 'member-page.php';
								header ("location: ".$url); 
								exit();	
								mysqli_free_result($result);
								mysqli_close($dbcon); 
							}else{
								echo '<div class="errors"></h2>Error!</h2>
								<p class = "error">The following error(s) occured:<br/>';
								foreach($errors as $msg){
								echo "->$msg<br/>";
								}
								echo '</p><h4>Please try again.</h4><br/><br/>';
							}
						}
					}
				?>
				<div class= "loggingin">
					<?php include('login.php');?>
				</div>
			</div>
		</div>
		<?php include('footer.php');?>
	</body>
</html>