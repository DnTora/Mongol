<?php
	$status = '';
	session_start();
	if(!isset($_POST['submit']))
		$status = 'threadDelete=error';
	else {
		include_once 'databaseConnect.php';
		$threadId = mysqli_real_escape_string($databaseConnect, $_POST['threadId']);
		$sql = "SELECT user_account_number FROM forum_threads WHERE thread_id = " . $threadId . ";";
		$result = mysqli_query($databaseConnect, $sql);
		$row = mysqli_fetch_assoc($result);
		if (mysqli_num_rows($result) == 1) {
			if ($row["user_account_number"] == $_SESSION['userAccountNumber']) {
				$sql2 = "DELETE FROM threads_messages WHERE thread_id = " . $threadId . ";";
				if (mysqli_query($databaseConnect, $sql2)) {
					$sql3 = "DELETE FROM forum_threads WHERE thread_id = " . $threadId . ";";
					if (mysqli_query($databaseConnect, $sql3))
						$status = 'threadDelete=success&messagesDelete=success';
					else
						$status = 'threadDelete=fail&messagesDelete=success';
				} else
					$status = 'threadDelete=fail&messagesDelete=fail';
			} else
				$status = 'threadDelete=error_noPermission';
		} else
			$status = 'threadDelete=error_notFound';
	}
	header('Location: ' . $_SERVER["HTTP_REFERER"]);
	exit();
?>
