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
                <h2 class="register">Registered Users</h2>
                <p>
                <?php
                    require("mysqli_connect.php");
                    $q = "Select CONCAT(lname, ', ' ,fname) AS fullname, DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat, user_id, email from users ORDER BY user_id ASC";
                    $result = @mysqli_query($dbcon, $q);
                    if ($result){
                        echo '<table> 
                            <tr>
                            <th><strong>Name</strong></th>
                            <th><strong>Email</strong></th>
                            <th><strong>Registered Date</strong></th>
                            <th colspan=2><strong>Actions</strong></th>
                            </tr>';
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            echo '
                            <tr>
                            <td>'.$row['fullname'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['regdat'].'</td>
                            <td><a href="edit_user.php?id='.$row['user_id'].'" class="edit-icon">!</a></td>
                            <td><a href="delete_user.php?id='.$row['user_id'].'" class="delete-icon">3</a></td>';
                        }
                        echo '</table>';
                        mysqli_free_result($result);
                    }else{
                        echo '<p class="error">The current registered users cannot be retrieved. Contact the system administrator.</p>'; 
                    }
                    mysqli_close($dbcon); 
                ?>
                </p>
			</div>
		</div>
		<?php include('footer.php');?>
	</body>
</html>