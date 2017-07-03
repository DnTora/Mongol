<?php
	$databaseConnect = mysqli_connect('localhost', 'id2031617_usersdb', '1234567890', 'id2031617_users');
	if(mysqli_connect_errno()) {
		die("Conection Failed: " . mysqli_connect_error());
	}
?>
