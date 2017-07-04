<?php
	session_start();
	$alert_htmlCode = '';
	if (isset($_SESSION['username'])) {
		echo
'			<main>
				<div id="div_main">
					<div id="div_rightTootbar">
						<div id="div_loginArea">
							<form method="POST" action="PHP/logout.php">
								<button id="button_logout" name="submit">התנתקות</button>
							</form>
						</div>
';
	} else {
		if (isset($_COOKIE['login_errorData']))
			$alert_htmlCode = '<p style="color:black; background-color:red; font-weight:bold;">' . $_COOKIE['login_errorData'] . '</p>';
		echo
'			<main>
				<div id="div_main">
					<div id="div_rightTootbar">
						<div id="div_loginArea">
							<form method="POST" action="PHP/login.php">
								<table id="table_loginArea">
									<tr>
										<td><h6>שם משתמש:</h6></td>
										<td><input class="loginTextBox" type="text" name="userName" /></td>
									</tr>
									<tr>
										<td><h6>סיסמה:</h6></td>
										<td><input class="loginTextBox" type="password" name="password" /></td>
									</tr>
								</table>
								<button id="button_login" name="submit">התחברות</button>
								<input id="button_openRegisterationWindow" type="button" value="הרשמה" onclick="toggleRegisterationWindow();" />
							</form>'
							. $alert_htmlCode .
						'</div>
';
	}
?>
