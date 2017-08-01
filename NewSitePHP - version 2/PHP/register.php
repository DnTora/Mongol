<?php
	$status = '';
	if(!isset($_POST['submit'])) {
		setcookie("registeration_errorData", "שימו לב: אירעה שגיאה!", time() + 10, "/");
		$status = 'register=error';
	} else {
		include_once 'databaseConnect.php';
		$userName = mysqli_real_escape_string($databaseConnect, $_POST['userName']);
		$password = mysqli_real_escape_string($databaseConnect, $_POST['password']);
		$passwordRepeat = mysqli_real_escape_string($databaseConnect, $_POST['passwordRepeat']);
		$privateName = mysqli_real_escape_string($databaseConnect , $_POST['privateName']);
		$familyName = mysqli_real_escape_string($databaseConnect , $_POST['familyName']);
		$emailAddress = mysqli_real_escape_string($databaseConnect, $_POST['emailAddress']);
		if(empty($userName) || empty($password) || empty($passwordRepeat)) {
			setcookie("registeration_errorData", "שימו לב: אחד או יותר משדות החובה לא מולאו!", time() + 10, "/");
			setrawcookie("registeration_textBoxData", $userName . "|" . $password . "|" . $passwordRepeat . "|" . $privateName . "|" . $familyName . "|" . $emailAddress, time() + 10, "/");
			$status = 'register=empty';
		} elseif($password!==$passwordRepeat) {
			setcookie("registeration_errorData", "שימו לב: הסיסמאות לא תואמות!", time() + 10, "/");
			setrawcookie("registeration_textBoxData", $userName . "|" . $password . "|" . $passwordRepeat . "|" . $privateName . "|" . $familyName . "|" . $emailAddress, time() + 10, "/");
			$status = 'register=passwordsMismatch';
		} elseif(!preg_match("/([a-zA-Z0-9])/", $userName) || strlen($userName) <= 2) {
			setcookie("registeration_errorData", "שימו לב: שם המשתמש חייב להכיל רק אותיות באנגלית ומספרים ואורכו צריך להיות 3 אותיות ומעלה!", time() + 10, "/");
			setrawcookie("registeration_textBoxData", $userName . "|" . $password . "|" . $passwordRepeat . "|" . $privateName . "|" . $familyName . "|" . $emailAddress, time() + 10, "/");
			$status = 'register=invalidName';
		} elseif(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
			setcookie("registeration_errorData", "שימו לב: האימייל לא תקין!", time() + 10, "/");
			setrawcookie("registeration_textBoxData", $userName . "|" . $password . "|" . $passwordRepeat . "|" . $privateName . "|" . $familyName . "|" . $emailAddress, time() + 10, "/");
			$status = 'register=invalidEmail';
		} else {
			$sql = "SELECT * FROM users WHERE user_name='$userName'";
			$result = mysqli_query($databaseConnect, $sql);
			$rowNum = mysqli_num_rows($result);
			if($rowNum > 0) {
				setcookie("registeration_errorData", "שימו לב: שם המשתמש תפוס!", time() + 10, "/");
				setrawcookie("registeration_textBoxData", $userName . "|" . $password . "|" . $passwordRepeat . "|" . $privateName . "|" . $familyName . "|" . $emailAddress, time() + 10, "/");
				$status = 'register=userNameExist';
			} else {
				$hashPass = password_hash($password, PASSWORD_DEFAULT);
				$sql = "INSERT INTO users (user_name, password, private_name, family_name, email_address) VALUES('$userName', '$hashPass', '$privateName', '$familyName', '$emailAddress')";
				$result = mysqli_query($databaseConnect, $sql);
				$status = 'register=success';
			}
		}
	}
	header('Location: ' . $_SERVER["HTTP_REFERER"]);
	exit();
?>
