<?php
	function getUserDetails($databaseConnect, $userAccountNumber) {
		$sql = "SELECT * FROM users WHERE user_account_number = " . $userAccountNumber;
		$result = mysqli_query($databaseConnect, $sql);
		return mysqli_fetch_assoc($result);
	}
	
	function isUserNameExist($databaseConnect, $userName) {
		$sql = "SELECT * FROM users WHERE user_name='$userName'";
		$result = mysqli_query($databaseConnect, $sql);
		$rowNum = mysqli_num_rows($result);
		if ($rowNum > 0)
			return true;
		return false;
	}
?>
