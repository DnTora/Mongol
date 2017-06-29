<?php
	session_start();
	if(isset($_POST['submit']))
	{
		include 'connect.php';
		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$userpassword = mysqli_real_escape_string($connect, $_POST['userpassword']);
		if(empty($username) || empty($userpassword)) {
			header('Location: index.php?login=empty');
			exit();
		}
		else {
			$sql = "SELECT * FROM login WHERE username='$username'";
			$result = mysqli_query($connect, $sql);
			$checkrow = mysqli_num_rows($result);
			if($checkrow < 1) {
				header('Location: index.php?login=ntexist');
				exit();
			}
			else{
				if($row = mysqli_fetch_assoc($result)) {
					$hashpass = password_verify($userpassword, $row['userpassword']);
					if($hashpass == false) { 
						header('Location: index.php?login=error');
						exit();
					}
					elseif($hashpass == true) {
						$_SESSION['username'] = $row['username'];
						$_SESSION['userpassword'] = $row['userpassword'];
						$_SESSION['useremail'] =  $row['useremail'] ;
						header('Location: index.php?login=success');
						exit();
					}
				}
			}
		}
	}
	else {
		header('Location: index.php?login=ntclick');
		exit();
	}
?>
