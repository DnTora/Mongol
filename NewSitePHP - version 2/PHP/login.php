<?php
	$status = '';
	session_start();
	if(!isset($_POST['submit'])) {
		setcookie("login_errorData", "שימו לב: אירעה שגיאה!", time() + 10, "/");
		$status = 'login=error';
	} else {
		include_once 'databaseConnect.php';
		$userName = mysqli_real_escape_string($databaseConnect, $_POST['userName']);
		$password = mysqli_real_escape_string($databaseConnect, $_POST['password']);
		if(empty($userName) || empty($password)) {
			setcookie("login_errorData", "שימו לב: אחד או יותר משדות החובה לא מולאו!", time() + 10, "/");
			setrawcookie("login_textBoxData", $userName . "|" . $password, time() + 10, "/");
			$status = 'login=empty';
		} else {
			$sql = "SELECT * FROM users WHERE user_name='$userName'";
			$result = mysqli_query($databaseConnect, $sql);
			$checkRow = mysqli_num_rows($result);
			if($checkRow == 0) {
				setcookie("login_errorData", "שימו לב: שם המשתמש לא נמצא במערכת!", time() + 10, "/");
				setrawcookie("login_textBoxData", $userName . "|" . $password, time() + 10, "/");
				$status = 'login=userNameNotFound';
			} elseif($row = mysqli_fetch_assoc($result)) {
				$hashPass = password_verify($password, $row['password']);
				if(!$hashPass) {
					setcookie("login_errorData", "שימו לב: הסיסמה שגויה!", time() + 10, "/");
					setrawcookie("login_textBoxData", $userName . "|" . $password, time() + 10, "/");
					$status = 'login=wrongPassword';
				} else {
					$_SESSION['userAccountNumber'] = $row['user_account_number'];
					$_SESSION['privateName'] = $row['private_name'];
					$_SESSION['familyName'] = $row['family_name'];
					$status = 'login=success';
				}
			}
		}
	}
	header('Location: ' . $_SERVER["HTTP_REFERER"]);
	exit();
?>
