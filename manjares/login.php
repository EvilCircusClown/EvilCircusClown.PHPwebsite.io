<h2 class = "login">Login</h2>
<form action="login-page.php" method=post>
	<p><label for = "email">Email Address: &nbsp;</label>
	<input type = "email" id = "email" name = "email" size ="30" maxlength="50" value = "<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
	</p>
								
	<p><label for = "psword">Password: &nbsp;</label>
	<input type = "password" id = "psword" name = "psword" size ="20" maxlength="40" value = "<?php if(isset($_POST['psword'])) echo $_POST['psword'] ?>">
	</p>
	<p class = "button"><input type = "submit" id = "submit" name = "submit" value = "Login"></p>
	</form>