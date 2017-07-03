<?php
	if(!isset($_POST['submit'])) {
		header('Location: ../index.php?register=ntclick');
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
			header('Location: ../index.php?register=empty');
			exit();
		} elseif($password!==$passwordRepeat) {
			setcookie("errg","שגיאה:האימות סיסמה לא תואמת ", time() + 1, "/");
			header('Location: ../index.php?register=passer');
			exit();
		} elseif(!preg_match("/([a-zA-Z0-9])/", $userName)) {
			header('Location: ../index.php?register=name1eror');
			exit();
		} elseif(strlen($userName) <= 3) {
			header('Location: ../index.php?register=name2eror');
			exit();
		} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header('Location: ../index.php?register=emaileror');
			exit();	
		} else {
			$sql = "SELECT * FROM users WHERE user_name='$userName'";
			$result = mysqli_query($databaseConnect, $sql);
			$rowNum = mysqli_num_rows($result);
			if($rowNum > 0) {
				header('Location: ../index.php?register=namecatch');
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
