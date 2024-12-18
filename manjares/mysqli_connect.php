<?php
$dbcon = @mysqli_connect('localhost', 'cedrickmanjares', 'cedrickmanjares', 'members_manjares')
OR die('Could not connect to the MySQL Server: '. mysqli_connect_error());
mysqli_set_charset($dbcon, 'utf8');