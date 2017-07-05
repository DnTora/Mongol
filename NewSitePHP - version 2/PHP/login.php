<?php
	session_start();
	if(!isset($_POST['submit'])) {
		setcookie("login_errorData", "שימו לב: אירעה שגיאה!", time() + 1, "/");
		header('Location: ../index.php?login=error');
		exit();
	} else {
		include 'databaseConnect.php';
		$userName = mysqli_real_escape_string($databaseConnect, $_POST['userName']);
		$password = mysqli_real_escape_string($databaseConnect, $_POST['password']);
		if(empty($userName) || empty($password)) {
			setcookie("login_errorData", "שימו לב: אחד או יותר משדות החובה לא מולאו!", time() + 1, "/");
			header('Location: ../index.php?login=empty');
			exit();
		} else {
			$sql = "SELECT * FROM users WHERE user_name='$userName'";
			$result = mysqli_query($databaseConnect, $sql);
			$checkRow = mysqli_num_rows($result);
			if($checkRow == 0) {
				setcookie("login_errorData", "שימו לב: שם המשתמש לא נמצא במערכת!", time() + 1, "/");
				header('Location: ../index.php?login=userNameNotFound');
				exit();
			} elseif($row = mysqli_fetch_assoc($result)) {
				$hashPass = password_verify($password, $row['password']);
				if(!$hashPass) {
					setcookie("login_errorData", "שימו לב: הסיסמה שגויה!", time() + 1, "/");
					header('Location: ../index.php?login=wrongPassword');
					exit();
				} else {
					$_SESSION['userName'] = $row['user_name'];
					$_SESSION['password'] = $row['password'];
					$_SESSION['emailAddress'] =  $row['email_address'] ;
					header('Location: ../index.php?login=success');
					exit();
				}
			}
		}
	}
?>
