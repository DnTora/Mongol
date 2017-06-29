<?php
session_start();
if(isset($_SESSION['username']))
{
		echo			'<main>
				<div id="div_main">
					<div id="div_rightTootbar">
						<div id="div_loginArea">
							<form method="POST" action="logoutphp.php"> <!-- !!!!!!!!!!!!!!!!!!! -->
								
									<button type="submit" name="submit">log out</button>
									
							</form>
						</div>';	
}
else{
	echo '		<main>
				<div id="div_main">
					<div id="div_rightTootbar">
						<div id="div_loginArea">
							<form method="POST" action="loginphp.php"> <!-- !!!!!!!!!!!!!!!!!!! -->
								<table id="table_loginArea">
									<tr>
										<td><h6>שם משתמש:</h6></td>
										<td><input class="loginTextBox" type="text" name="username" /></td>
									</tr>
									<tr>
										<td><h6>סיסמה:</h6></td>
										<td><input class="loginTextBox" type="text" name="userpassword" /></td>
									</tr>
								</table>
								<button id="button_login" name="submit">התחברות</button>
								<input type="button" value="הרשמה" onclick="openregister()">
							</form>
						</div>';
						
		
}


						
				
		?>