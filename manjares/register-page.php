<!doctype html>
<html lang=en>
	<head>
		<title>Register Page - Website ni Manjares</title>
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
							$errors = array();
							if(empty($_POST['fname'])){
								$errors[] = 'Please enter your first name.';
							}else{
								$fn = trim($_POST['fname']);
							}
							if(empty($_POST['lname'])){
								$errors[] = 'Please enter your last name.';
							}else{
								$ln = trim($_POST['lname']);
							}
							if(empty($_POST['email'])){
								$errors[] = 'Please enter your email.';
							}else{
								$e = trim($_POST['email']);
							}
							if(!empty($_POST['psword1'])){
								if($_POST['psword1'] != $_POST['psword2']){
									$errors[] = 'Your password does not match.';
								}else{
									$p = trim($_POST['psword1']);
									$hp = sha1($p);
								}
							}else{
								$errors[] = 'Please enter your password.';
							}

							if(empty($errors)){
									require ('mysqli_connect.php');
									$q = "INSERT INTO users (fname, lname, email, psword, registration_date) VALUES ('$fn', '$ln', '$e', '$hp', NOW())";	
									$result = @mysqli_query ($dbcon, $q);
									if ($result) { 
									header ("location: register-thanks.php"); 
									exit();	
									} else { 
										echo '<div class="errors"><h2>System Error</h2>
										<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
									
										echo '<p>' . mysqli_error($dbcon) . '</p>
										<img src="https://media1.tenor.com/m/L-AUlf-d2HoAAAAd/anko-vuvuzela.gif"></img>';
									}
									mysqli_close($dbcon); 
									include ('footer.php');
									exit();

							}
							else{
								echo '<div class="errors"></h2>Error!</h2>
								<p class = "error">The following error(s) occured:<br/>';
								foreach($errors as $msg){
								echo "->$msg<br/>";
								}
								echo '</p><h4>Please try again.</h4><br/><br/></div>';
							}
					}
				?>
				<div class= "registration">
					<h2 class = "register">Register</h2>
						<form action="register-page.php"method=post>
							<p><label for = "fname">First Name: &nbsp;</label>
							<input type = "text" id = "fname" name = "fname" size ="30" maxlength="40" value = "<?php if(isset($_POST['fname'])) echo htmlspecialchars($_POST['fname']); ?>">
							</p>

							<p><label for = "lname">Last Name: &nbsp;</label>
							<input type = "text" id = "lname" name = "lname" size ="30" maxlength="40" value = "<?php if(isset($_POST['lname'])) echo htmlspecialchars($_POST['lname']); ?>">
							</p>

							<p><label for = "email">Email Address: &nbsp;</label>
							<input type = "email" id = "email" name = "email" size ="30" maxlength="50" value = "<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
							</p>
								
							<p><label for = "psword1">Password: &nbsp;</label>
							<input type = "password" id = "psword" name = "psword1" size ="20" maxlength="40" value = "<?php if(isset($_POST['psword1'])) echo $_POST['psword1'] ?>">
							</p>

							<p><label for = "psword2"> Confirm Password: &nbsp;</label>
							<input type = "password" id = "psword" name = "psword2" size ="20" maxlength="40" value = "<?php if(isset($_POST['psword2'])) echo $_POST['psword2'] ?>">
							</p>
							<p class = "button"><input type = "submit" id = "submit" name = "submit" value = "Register"></p>
						</form>
				</div>
			</div>
		</div>
		<?php include('footer.php');?>
	</body>
</html>