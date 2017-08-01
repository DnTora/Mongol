<?php
	$status = '';
	session_start();
	if (!isset($_POST['submit']))
		$status = 'createThreadMessage=error';
	else {
		include_once 'databaseConnect.php';
		$threadId = mysqli_real_escape_string($databaseConnect, $_POST['threadId']);
		$threadMessageTitle = mysqli_real_escape_string($databaseConnect, $_POST['threadMessageTitle']);
		$threadMessageContent = mysqli_real_escape_string($databaseConnect, $_POST['threadMessageContent']);
		$sql = "INSERT INTO threads_messages (thread_id, user_account_number, message_title, message_content) VALUES (" . $threadId . ", \"" . $_SESSION['userAccountNumber'] . "\", \"" . $threadMessageTitle . "\", \"" . $threadMessageContent . "\")";
		if (mysqli_query($databaseConnect, $sql))
			$status = 'createThreadMessage=success';
		else
			$status = 'createThreadMessage=fail';
	}
	header('Location: ' . $_SERVER["HTTP_REFERER"]);
	exit();
?>
