<?php
	function getUserName($databaseConnect, $userAccountNumber) {
		$sql = "SELECT user_name FROM users WHERE user_account_number = " . $userAccountNumber;
		$result = mysqli_query($databaseConnect, $sql);
		if (mysqli_num_rows($result) == 1)
			return mysqli_fetch_array($result)[0];
		return null;
	}
	
	function isForumEmpty($databaseConnect) {
		$sql = 'SELECT * FROM forum_threads ORDER BY thread_date';
		$result = mysqli_query($databaseConnect, $sql);
		if (mysqli_num_rows($result) == 0)
			return true;
		return false;
	}
	
	function getAllThreadsInformation($databaseConnect) {
		$sql = 'SELECT * FROM forum_threads ORDER BY thread_date';
		return mysqli_query($databaseConnect, $sql);
	}
?>
