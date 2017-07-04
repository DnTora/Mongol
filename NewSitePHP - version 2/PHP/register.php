<?php
	if(!isset($_POST['submit'])) {
		setcookie("registeration_errorData", "שימו לב: אירעה שגיאה!", time() + 1, "/");
		header('Location: ../index.php?register=error');
		exit();
	} else {
		include_once 'databaseConnect.php';
		$userName = mysqli_real_escape_string($databaseConnect, $_POST['userName']);
		$password = mysqli_real_escape_string($databaseConnect, $_POST['password']);
		$passwordRepeat = mysqli_real_escape_string($databaseConnect, $_POST['passwordRepeat']);
		$privateName = mysqli_real_escape_string($databaseConnect , $_POST['privateName']);
		$familyName = mysqli_real_escape_string($databaseConnect , $_POST['familyName']);
		$email = mysqli_real_escape_string($databaseConnect, $_POST['email']);
		if(empty($userName) || empty($password) || empty($passwordRepeat)) {
			setcookie("registeration_errorData", "שימו לב: אחד או יותר משדות החובה לא מולאו!", time() + 1, "/");
			header('Location: ../index.php?register=empty');
			exit();
		} elseif($password!==$passwordRepeat) {
			setcookie("registeration_errorData", "שימו לב: הסיסמאות לא תואמות!", time() + 1, "/");
			header('Location: ../index.php?register=passwordsMismatch');
			exit();
		} elseif(!preg_match("/([a-zA-Z0-9])/", $userName) || strlen($userName) <= 2) {
			setcookie("registeration_errorData", "שימו לב: שם המשתמש חייב להכיל רק אותיות באנגלית ומספרים ואורכו צריך להיות 3 אותיות ומעלה!", time() + 1, "/");
			header('Location: ../index.php?register=invalidName');
			exit();
		} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			setcookie("registeration_errorData", "שימו לב: האימייל לא תקין!", time() + 1, "/");
			header('Location: ../index.php?register=invalidEmail');
			exit();
		} else {
			$sql = "SELECT * FROM users WHERE user_name='$userName'";
			$result = mysqli_query($databaseConnect, $sql);
			$rowNum = mysqli_num_rows($result);
			if($rowNum > 0) {
				setcookie("registeration_errorData", "שימו לב: שם המשתמש תפוס!", time() + 1, "/");
				header('Location: ../index.php?register=userNameExist');
				exit();
			} else {
				$hashPass = password_hash($password, PASSWORD_DEFAULT);
				$sql = "INSERT INTO users (user_name, password, private_name, family_name, email) VALUES('$userName', '$hashPass', '$privateName', '$familyName', '$email')";
				$result = mysqli_query($databaseConnect, $sql);
				header('Location: ../index.php?register=success');
				exit();
			}
		}
	}
?>
