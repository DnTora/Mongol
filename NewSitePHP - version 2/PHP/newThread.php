<?php
	$status = '';
	session_start();
	if (!isset($_POST['submit']))
		$status = 'createThread=error';
	else {
		include_once 'databaseConnect.php';
		$threadTitle = mysqli_real_escape_string($databaseConnect, $_POST['threadTitle']);
		$threadContent = mysqli_real_escape_string($databaseConnect, $_POST['threadContent']);
		$sql = "INSERT INTO forum_threads (user_account_number, thread_title, thread_content) VALUES (\"" . $_SESSION['userAccountNumber'] . "\", \"" . $threadTitle . "\", \"" . $threadContent . "\")";
		if (mysqli_query($databaseConnect, $sql))
			$status = 'createThread=success';
		else
			$status = 'createThread=fail';
	}
	header('Location: ' . $_SERVER["HTTP_REFERER"]);
	exit();
?>
