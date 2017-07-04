<?php
	$alert_htmlCode = '';
	if (isset($_COOKIE['registeration_errorData']))
			$alert_htmlCode = '<br /><p style="color:black; background-color:red; font-weight:bold;">' . $_COOKIE['registeration_errorData'] . '</p>';
	echo
'				<div id="div_registerationPopUp">
					<div id="div_registerationWindow">
						<div id="div_registerationTitle" align="center">
							<image id="imageButton_close" src="resources/images/closeButton.png" onclick="toggleRegisterationWindow();"></image>
							<h2>הרשמה</h2>
						</div>
						<div id="div_registerationContent" align="center">
							<br />
							<br />
							<form method="POST" action="PHP/register.php">
								<table>
									<tr>
										<td><p><span style="color:red">*</span> שם משתמש:</p></td>
										<td class="registerationTextBox"><input type="text" name="userName" /></td>
									</tr>
								</table>
								<table>
									<tr>
										<td><p><span style="color:red">*</span> סיסמה:</p></td>
										<td class="registerationTextBox"><input type="password" name="password" /></td>
									</tr>
								</table>
								<table>
									<tr>
										<td><p><span style="color:red">*</span> אימות סיסמה:</p></td>
										<td class="registerationTextBox"><input type="password" name="passwordRepeat" /></td>
									</tr>
								</table>
								<br />
								<table>
									<tr>
										<td><p>שם פרטי:</p></td>
										<td class="registerationTextBox"><input type="text" name="privateName" /></td>
									</tr>
								</table>
								<table>
									<tr>
										<td><p>שם משפחה:</p></td>
										<td class="registerationTextBox"><input type="text" name="familyName" /></td>
									</tr>
								</table>
								<table>
									<tr>
										<td><p>אימייל:</p></td>
										<td class="registerationTextBox"><input type="text" name="email" /></td>
									</tr>
								</table>
								<br />
								<p style="color:red">* שדות חובה</p>
								<button id="button_register" name="submit">הרשמה</button>
							</form>'
							. $alert_htmlCode .
						'</div>
					</div>
				</div>
			</div>
			<script src="JS/script.js"></script>
		</body>
	</html>
'
?>
