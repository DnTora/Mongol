<?php
	session_start();
	if (isset($_POST['submit'])) {
		include_once 'databaseConnect.php';
		$sql = "DELETE FROM users WHERE user_account_number=" . $_SESSION['userAccountNumber'];
		$result = mysqli_query($databaseConnect, $sql);
		session_unset();
		session_destroy();
		header('Location: ' . $_SERVER["HTTP_REFERER"]);
	}
	exit();
?>
