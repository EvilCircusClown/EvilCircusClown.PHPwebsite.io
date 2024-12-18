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
		<title>Delete User - Website ni Manjares</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="css2/includes.css">
	</head>
	<body>
		<div id="container">
		<?php include('header-admin.php');?>
		<?php include('nav-admin.php');?>
		<?php include('info-col.php');?>
			<div id="content">
			 <h2>Deleting Record...</h2>
			 <?php
			 	if((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
					$id = $_GET['id'];
				}elseif((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
					$id = $_POST['id'];
				}else{
					echo'<div class = "errors">
					<h3>You shouldn\'t be deer. </br> </br>
					<left><a href="index.php" id="return-home">Go Back Now.</a></left>
					</div>
					<img src="https://media1.tenor.com/m/us9LtNwJrFsAAAAd/shikanoko-nokonoko-koshitantan-shikanoko.gif" alt="not-deer"></img>
					</h3>';
					exit();
				}
				require('mysqli_connect.php');
				if($_SERVER['REQUEST_METHOD'] == 'POST') {
					if($_POST['sure'] == 'Yes'){
						$q = "DELETE FROM users WHERE user_id = $id";
						$result = @mysqli_query($dbcon, $q);
						if(mysqli_affected_rows($dbcon) == 1){
							echo'<div class = "errors">
							<h2>Deleted Successfully... </br> </br> </h2>
							<h3><left><a href="register-view-users.php" id="return-home">Return to View Users.</a></left></h3>
							</div>
							<img src= "https://media.tenor.com/wPfnrX4tdj4AAAAi/bashame-explode.gif" alt = "Deleted"></img>';
						}
						else{
							echo'<div class = "errors">
							<h3>Oh deer, I don\'t know how that got deleted - Error</br> </br>
							<left><a href="register-view-users.php" id="return-home">Go Back Now.</a></left></h3>
							</div>
							<img src = "https://media.tenor.com/69YMYoTiF2EAAAAi/shikanoko-nokonoko-koshitantan-speech-bubble.gif" alt = "idk"></img>';
						}
					}else{
						echo'<div class = "errors">
						<h3>Your record has not been deleted.</br> </br>
						<left><a href="register-view-users.php" id="return-home">Go Back Now.</a><left></h3>
						</div>
						<img src = "https://media1.tenor.com/m/4Ob0zR2MXm0AAAAC/shika-shikanoko.gif" alt = "didnt"></img>';
					}
				}else{
					$q = "SELECT CONCAT(fname, ', ', lname) from users where user_id=$id";
					$result = @mysqli_query($dbcon, $q);
					if(mysqli_num_rows($result) == 1){
						$row= mysqli_fetch_array($result, MYSQLI_NUM);
						echo'<div class = "errors-buttons">';
						echo"<h3>Are you sure you want to delete $row[0]</h3>";
						echo'
						<form action="delete_user.php" method="post">
						<left><input id ="submit-yes" type = "submit" name = "sure" value = "Yes"></left>
						<left><input id ="submit-no" type = "submit" name = "sure" value = "No"></left>
						<input type="hidden" name ="id" value="'.$id.'">
						</br>
						</form>
						</div>';
					}else{
						echo'<div class = "errors">
						<h3>Who the deer are you?  </br> </br>
						<a href="register-page.php" id="register-now">Please Register Now.</a>
						</div>
						<img src="https://media1.tenor.com/m/PkT8eUBZUGUAAAAd/nokotan-shikanoko-nokonoko-koshitantan.gif" alt="Unbelong"></img>
						</h3>';
					}
				}
				mysqli_close($dbcon);
				?>
			</div>
		</div>
		<?php include('footer.php');?>
	</body>
</html>