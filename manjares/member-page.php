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
			<div id="content">
			<h2>This is my homepage</h2>
			<p>Lorem ipsum odor amet, consectetuer adipiscing elit. Dictumst rutrum commodo class cursus sociosqu fusce cras nostra congue. Adipiscing non eros; vitae cursus malesuada efficitur ultrices blandit. Nam natoque egestas fermentum orci dapibus quisque nascetur mi in. Nostra rutrum dictum maximus gravida nascetur. Massa id penatibus mus curabitur sed cras diam. Venenatis turpis id interdum nisi ridiculus. Senectus nisi neque consectetur pretium mattis. Leo orci phasellus taciti nec, luctus efficitur viverra?</p>

			<p>Eget vivamus lobortis sit nostra; neque facilisi lacinia varius aenean! Ultrices fringilla at curabitur semper lacus; est commodo. Fames adipiscing massa aliquam; duis risus velit. Leo purus lacinia condimentum est facilisis, faucibus hac nascetur rutrum. Ad iaculis pharetra dui maximus condimentum neque aenean mi auctor. Tempus molestie cursus iaculis vivamus sem? Molestie leo maximus non auctor turpis. Malesuada purus pellentesque quisque tristique mattis suspendisse. Neque congue nunc arcu vitae eros aenean massa accumsan feugiat.</p>

			<p>Dui scelerisque suscipit penatibus sit sollicitudin mus. Eu primis dapibus convallis aenean, consectetur integer habitant. Efficitur lacus aptent rhoncus, conubia lectus donec quis. Sem varius diam ridiculus tristique lobortis interdum odio. Platea nullam aenean ridiculus vehicula in hac velit. Diam rhoncus libero ex varius curabitur vivamus tempus. Placerat ornare magna suscipit potenti sit erat. Nostra tristique enim sollicitudin euismod sagittis ornare ante habitasse in. Magnis malesuada non risus sem leo vel; ut class.</p>
			</div>
		</div>
		<?php include('footer.php');?>
	</body>
</html>