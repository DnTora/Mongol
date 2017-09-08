<?php
	$status = '';
	if(isset($_POST['submit'])) {
		session_start();
		session_unset();
		session_destroy();
		$status = 'logout=success';
	} else
		$status = 'logout=error';
	header('Location: ' . $_SERVER["HTTP_REFERER"]);
	exit();
?>
