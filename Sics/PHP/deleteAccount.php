<?php
	session_start();
	if (isset($_POST['submit'])) {
		include_once 'databaseConnect.php';
		include_once 'queries/queries.php';
		$currentPassword = mysqli_real_escape_string($databaseConnect, $_POST['currentPassword']);
		$row = getUserDetails($databaseConnect, $_SESSION['userAccountNumber'], 'password');
		if (empty($currentPassword))
			setcookie("accountDeleteConfirmation_status", "שימו לב: יש להזין את סיסמת המשתמש לאישור!", time() + 10, "/");
		elseif (!password_verify($currentPassword, $row['password']))
			setcookie("accountDeleteConfirmation_status", "שימו לב: הסיסמה שגויה!", time() + 10, "/");
		else {
			$sql = "DELETE FROM users WHERE user_account_number=" . $_SESSION['userAccountNumber'];
			$result = mysqli_query($databaseConnect, $sql);
			session_unset();
			session_destroy();
		}
		header('Location: ' . $_SERVER["HTTP_REFERER"]);
	}
	exit();
?>
