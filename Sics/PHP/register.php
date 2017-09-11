<?php
	if(isset($_POST['submit'])) {
		include_once 'databaseConnect.php';
		$userName = mysqli_real_escape_string($databaseConnect, $_POST['userName']);
		$password = mysqli_real_escape_string($databaseConnect, $_POST['password']);
		$passwordRepeat = mysqli_real_escape_string($databaseConnect, $_POST['passwordRepeat']);
		$privateName = mysqli_real_escape_string($databaseConnect , $_POST['privateName']);
		$familyName = mysqli_real_escape_string($databaseConnect , $_POST['familyName']);
		$emailAddress = mysqli_real_escape_string($databaseConnect, $_POST['emailAddress']);
		if(empty($userName) || empty($password) || empty($passwordRepeat))
			setcookie("registeration_status", "שימו לב: אחד או יותר משדות החובה לא מולאו!", time() + 10, "/");
		elseif($password!==$passwordRepeat)
			setcookie("registeration_status", "שימו לב: הסיסמאות לא תואמות!", time() + 10, "/");
		elseif(!preg_match("/([a-zA-Z0-9])/", $userName) || strlen($userName) <= 2)
			setcookie("registeration_status", "שימו לב: שם המשתמש חייב להכיל רק אותיות באנגלית ומספרים ואורכו צריך להיות 3 אותיות ומעלה!", time() + 10, "/");
		elseif(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL) && !empty($emailAddress))
			setcookie("registeration_status", "שימו לב: האימייל לא תקין!", time() + 10, "/");
		else {
			$sql = "SELECT * FROM users WHERE user_name='$userName'";
			$result = mysqli_query($databaseConnect, $sql);
			$rowNum = mysqli_num_rows($result);
			if($rowNum > 0)
				setcookie("registeration_status", "שימו לב: שם המשתמש תפוס!", time() + 10, "/");
			else {
				$hashPass = password_hash($password, PASSWORD_DEFAULT);
				$sql = "INSERT INTO users (user_name, password, private_name, family_name, email_address) VALUES('$userName', '$hashPass', '$privateName', '$familyName', '$emailAddress')";
				$result = mysqli_query($databaseConnect, $sql);
				setcookie("registeration_status", "ההרשמה בוצעה בהצלחה!", time() + 10, "/");
			}
		}
		header('Location: ' . $_SERVER["HTTP_REFERER"]);
	}
	exit();
?>
