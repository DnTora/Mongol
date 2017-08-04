<?php
	function getUserName($databaseConnect, $userAccountNumber) {
		$sql = "SELECT user_name FROM users WHERE user_account_number = " . $userAccountNumber;
		$result = mysqli_query($databaseConnect, $sql);
		if (mysqli_num_rows($result) == 1)
			return mysqli_fetch_array($result)[0];
		return null;
	}
	
	function isThreadExist($databaseConnect, $threadId) {
		$sql = 'SELECT * FROM forum_threads WHERE thread_id = ' . $threadId;
		$result = mysqli_query($databaseConnect, $sql);
		if (mysqli_num_rows($result) != 0)
			return true;
		return false;
	}
	
	function isThreadEmpty($databaseConnect, $threadId) {
		$sql = "SELECT * FROM threads_messages WHERE thread_id = " . $threadId . " ORDER BY message_date";
		$result = mysqli_query($databaseConnect, $sql);
		if (mysqli_num_rows($result) == 0)
			return true;
		return false;
	}
	
	function getThreadInformation($databaseConnect, $threadId) {
		$sql = 'SELECT * FROM forum_threads WHERE thread_id = ' . $threadId;
		return mysqli_query($databaseConnect, $sql);
	}
	
	function getThreadMessagesInformation($databaseConnect, $threadId) {
		$sql = "SELECT * FROM threads_messages WHERE thread_id = " . $threadId . " ORDER BY message_date";
		return mysqli_query($databaseConnect, $sql);
	}
?>
