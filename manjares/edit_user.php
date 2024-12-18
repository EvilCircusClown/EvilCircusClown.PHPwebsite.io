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
				<?php
					if((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
						$id = $_GET['id'];
					}elseif((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
						$id = $_POST['id'];
					}else{
						echo'<div class="errors"><h3>You shouldn\'t be deer. </br> </br> 
						<left><a href="index.php" id="return-home">Go Back Now.</a></left>
						</div>
						<img src="https://media1.tenor.com/m/us9LtNwJrFsAAAAd/shikanoko-nokonoko-koshitantan-shikanoko.gif" alt="not-deer"></img>
						</h3>';
						exit();
					}
					require("mysqli_connect.php");
					$q = "SELECT fname, lname, email, psword FROM users WHERE user_id=$id";
					$result = @mysqli_query($dbcon, $q);
					$row = mysqli_fetch_assoc($result);
					$perror = 'nothing';
					if(mysqli_num_rows($result) == 1){
						if($_SERVER['REQUEST_METHOD'] == 'POST') {
							if(!empty($_POST['fname'])){
								$fn = trim($_POST['fname']);
							}else{
								$fn = $row['fname'];
							}
							if(!empty($_POST['lname'])){
								$ln = trim($_POST['lname']);
							}else{
								$ln = $row['lname'];
							}
							if(!empty($_POST['email'])){
								$e = trim($_POST['email']);
							}else{
								$e = $row['email'];
							}
							if(!empty($_POST['psword1']) or !empty($_POST['psword2'])){
								if($_POST['psword1'] != $_POST['psword2']){
									$perror = 'Your password does not match.';
								}else{
									$p = trim($_POST['psword1']);
									$hp = sha1($p);;
								}
							}else{
								$hp = $row['psword'];
							}
							if($perror != 'Your password does not match.'){
								$q = "UPDATE users SET fname='$fn', lname='$ln', email='$e', psword='$hp' WHERE user_id = $id";
								$result = @mysqli_query($dbcon, $q);
								if ($result) { 
									echo '<div class = "errors">
									<h2>User is successful</h2>
									<p>Congratulations you have edited this member (or not)</p>
									<left><a href="register-view-users.php" id="return-home">Return to users.</a></left></div>
            						<img src= "https://media.tenor.com/35c2t_yI448AAAAM/my-deer-friend-nokotan-nokotan.gif" alt = "Congrats"></img>'; 
									exit();	
									} else { 
										echo '<div class="errors"><h2>System Error</h2>
										<p class="error">The member could not be edited due to a system error. We apologize for any inconvenience.</p>'; 
									
										echo '<p>' . mysqli_error($dbcon) . '</p></div>
										<img src="https://media1.tenor.com/m/L-AUlf-d2HoAAAAd/anko-vuvuzela.gif"></img>';
									}
									mysqli_close($dbcon); 
									include ('footer.php');
									exit();
								}	
							else{
								echo '<div class="errors"></h2>Error!</h2>
								<p class = "error">The following error occured:<br/>';
								echo '"'.$perror.'"<br/>';
								echo '</p>Please try again.<br/><br/></div>';
								}
						}
							$q = "Select CONCAT(fname, ', ' ,lname) from users where user_id=$id";
							$result = @mysqli_query($dbcon, $q);
							$row= mysqli_fetch_array($result, MYSQLI_NUM);
							echo'<div class= "editing"> 
							<form action="edit_user.php"method=post>';
							echo"<h2>Edit $row[0]</h2>";
							echo'<input type="hidden" name ="id" value="'.$id.'">';
							echo'<p><label for = "fname">New First Name: &nbsp;</label>
							<input type = "text" id = "fname" name = "fname" size ="30" maxlength="40" value = "'. (isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : '') .'">
							</p>
							<p><label for = "lname">New Last Name: &nbsp;</label>
							<input type = "text" id = "lname" name = "lname" size ="30" maxlength="40" value = "' . (isset($_POST['lname']) ? htmlspecialchars($_POST['lname']) : '') . '">
							</p>

							<p><label for = "email">New Email Address: &nbsp;</label>
							<input type = "email" id = "email" name = "email" size ="30" maxlength="50" value = "' . (isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '') . '">
							</p>
									
							<p><label for = "psword1">New Password: &nbsp;</label>
							<input type = "password" id = "psword" name = "psword1" size ="20" maxlength="40" value = "' . (isset($_POST['psword1']) ? $_POST['psword1'] : '') . '">
							</p>

							<p><label for = "psword2">Confirm New Password: &nbsp;</label>
							<input type = "password" id = "psword" name = "psword2" size ="20" maxlength="40" value = "' . (isset($_POST['psword2']) ? $_POST['psword2'] : '') . '">
							</p>
							
							<p class = "button"><input type = "submit" id = "submit" name = "submit" value = "Edit"></p>
								
							</form>
							</div>';		
						}
					else{
						echo'<div class = "errors">
						<h3>Who the deer are you?  </br> </br>
						<a href="register-page.php" id="register-now">Please Register Now.</a>
						</div>
						<img src="https://media1.tenor.com/m/PkT8eUBZUGUAAAAd/nokotan-shikanoko-nokonoko-koshitantan.gif" alt="Unbelong"></img>
						</h3>';
						}
				?>
			</div>
		</div>
		<?php include('footer.php');?>
	</body>
</html>