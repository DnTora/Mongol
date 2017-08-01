<?php
	$status = '';
	session_start();
	if(!isset($_POST['submit']))
		$status = 'messageDelete=error';
	else {
		include_once 'databaseConnect.php';
		$sql = "SELECT user_account_number FROM threads_messages WHERE message_id = " . $_POST['messageId'];
		$result = mysqli_query($databaseConnect, $sql);
		$row = mysqli_fetch_assoc($result);
		if (mysqli_num_rows($result) == 1) {
			if ($row["user_account_number"] == $_SESSION['userAccountNumber']) {
				$sql2 = "DELETE FROM threads_messages WHERE message_id = " . $_POST['messageId'];
				if (mysqli_query($databaseConnect, $sql2))
					$status = 'messageDelete=success';
				else
					$status = 'messageDelete=fail';
			} else
				$status = 'messageDelete=error_noPermission';
		} else
			$status = 'messageDelete=error_notFound';
	}
	header('Location: ' . $_SERVER["HTTP_REFERER"]);
	exit();
?>
