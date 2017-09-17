<?php
	session_start();
	if (isset($_POST['submit'])) {
		include_once 'databaseConnect.php';
		include_once 'queries/queries.php';
		$privateName = mysqli_real_escape_string($databaseConnect , $_POST['privateName']);
		$familyName = mysqli_real_escape_string($databaseConnect , $_POST['familyName']);
		$emailAddress = mysqli_real_escape_string($databaseConnect, $_POST['emailAddress']);
		$userName = mysqli_real_escape_string($databaseConnect, $_POST['userName']);
		$password = mysqli_real_escape_string($databaseConnect, $_POST['password']);
		$passwordRepeat = mysqli_real_escape_string($databaseConnect, $_POST['passwordRepeat']);
		$currentPassword = mysqli_real_escape_string($databaseConnect, $_POST['currentPassword']);
		
		$isNewPasswordEntered = (!empty($password) || !empty($passwordRepeat));
		$row = getUserDetails($databaseConnect, $_SESSION['userAccountNumber'], 'user_name, password');
		if (empty($userName) || empty($currentPassword))
			setcookie("accountUpdate_status", "שימו לב: אחד או יותר משדות החובה לא מולאו!", time() + 10, "/");
		elseif ($isNewPasswordEntered && $password!==$passwordRepeat)
			setcookie("accountUpdate_status", "שימו לב: הסיסמאות לא תואמות!", time() + 10, "/");
		elseif (!preg_match("/([a-zA-Z0-9])/", $userName) || strlen($userName) <= 2)
			setcookie("accountUpdate_status", "שימו לב: שם המשתמש חייב להכיל רק אותיות באנגלית ומספרים ואורכו צריך להיות 3 אותיות ומעלה!", time() + 10, "/");
		elseif (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL) && !empty($emailAddress))
			setcookie("accountUpdate_status", "שימו לב: האימייל לא תקין!", time() + 10, "/");
		elseif (!password_verify($currentPassword, $row['password']))
			setcookie("accountUpdate_status", "שימו לב: הסיסמה שגויה!", time() + 10, "/");
		else {
			if (isUserNameExist($databaseConnect, $userName) && $row['user_name'] != $userName)
				setcookie("accountUpdate_status", "שימו לב: שם המשתמש תפוס!", time() + 10, "/");
			else {
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
				$sql = "";
				if ($isNewPasswordEntered)
					$sql = "UPDATE users SET user_name='$userName', password='$hashedPassword', private_name='$privateName', family_name='$familyName', email_address='$emailAddress' WHERE user_account_number=" . $_SESSION['userAccountNumber'];
				else
					$sql = "UPDATE users SET user_name='$userName', private_name='$privateName', family_name='$familyName', email_address='$emailAddress' WHERE user_account_number=" . $_SESSION['userAccountNumber'];
				$result = mysqli_query($databaseConnect, $sql);
				setcookie("accountUpdate_status", "הפרטים שונו בהצלחה!", time() + 10, "/");
				$_SESSION['userName'] = $userName;
			}
		}
		header('Location: ' . $_SERVER["HTTP_REFERER"]);
	}
	exit();
?>
