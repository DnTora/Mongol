<!--//////////////////////////////////////////////////// HIDDEN STATIC CONTENT ///////////////////////////////////////////////////-->
			<div id="div_registerationPopUp">
				<div id="div_registerationWindow">
					<div id="div_registerationWindowTitle" align="center">
						<image class="imageButton_close" src="resources/images/closeButton.png" onclick="togglePopUpWindowAreaVisibility('div_registerationPopUp');"></image>
						<h2>הרשמה</h2>
					</div>
					<div id="div_registerationWindowContent" align="center">
						<br />
						<br />
						<form id="form_registeration" method="POST" action="PHP/register.php">
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
									<td class="registerationTextBox"><input type="text" name="emailAddress" /></td>
								</tr>
							</table>
							<br />
							<p style="color:red">* שדות חובה</p>
							<button id="button_register" name="submit">הרשמה</button>
						</form>
						<?php
							if (isset($_COOKIE['registeration_errorData'])) {
								echo
									'<br />';
								echo
									'<p style="color:black; background-color:red; font-weight:bold;">' . $_COOKIE['registeration_errorData'] . '</p>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
		<script src="JS/script.js"></script>
	</body></center>
</html>
