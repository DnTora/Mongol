<?php
	$databaseConnect = mysqli_connect('localhost', '**********************', '**********', '**********************');
	if(mysqli_connect_errno()) {
		die("Conection Failed: " . mysqli_connect_error());
	}
?>
