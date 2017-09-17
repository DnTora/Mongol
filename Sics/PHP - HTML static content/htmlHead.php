<?php
	session_start();
	if (isset($_SESSION['userAccountNumber'])) {
		include_once 'PHP/databaseConnect.php';
		$sql = "SELECT user_account_number FROM users WHERE user_account_number=" . $_SESSION['userAccountNumber'];
		$result = mysqli_query($databaseConnect, $sql);
		$rowNum = mysqli_num_rows($result);
		if ($rowNum == 0) {
			session_unset();
			session_destroy();
		}
	}
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
	<head>
		<meta charset="utf-8" />
		<title>Sics</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="resources/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="CSS/global.css" />
		<link rel="stylesheet" href="CSS/header.css" />
		<link rel="stylesheet" href="CSS/main.css" />
		<link rel="stylesheet" href="CSS/footer.css" />
		
		<link rel="stylesheet" href="CSS/pages_styles/index.css" />
		<link rel="stylesheet" href="CSS/pages_styles/order.css" />
	</head>
