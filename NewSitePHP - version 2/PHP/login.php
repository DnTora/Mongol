<?php
	session_start();
	if(isset($_POST['submit'])) {
		include 'databaseConnect.php';
		$userName = mysqli_real_escape_string($databaseConnect, $_POST['userName']);
		$password = mysqli_real_escape_string($databaseConnect, $_POST['password']);
		if(empty($userName) || empty($password)) {
			header('Location: ../index.php?login=empty');
			exit();
		} else {
			$sql = "SELECT * FROM users WHERE user_name='$userName'";
			$result = mysqli_query($databaseConnect, $sql);
			$checkRow = mysqli_num_rows($result);
			if($checkRow < 1) {
				header('Location: ../index.php?login=ntexist');
				exit();
			} elseif($row = mysqli_fetch_assoc($result)) {
				$hashPass = password_verify($password, $row['password']);
				if($hashPass == false) { 
					header('Location: ../index.php?login=error');
					exit();
				} elseif($hashPass == true) {
					$_SESSION['userName'] = $row['userName'];
					$_SESSION['password'] = $row['password'];
					$_SESSION['email'] =  $row['email'] ;
					header('Location: ../index.php?login=success');
					exit();
				}
			}
		}
	} else {
		header('Location: ../index.php?login=ntclick');
		exit();
	}
?>
