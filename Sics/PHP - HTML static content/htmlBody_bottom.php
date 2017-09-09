<!--//////////////////////////////////////////////////// HIDDEN STATIC CONTENT ///////////////////////////////////////////////////-->
			<div id="div_registerationPopUp">
				<div id="div_registerationWindow">
					<div id="div_registerationWindowTitle">
						<img id="imageButton_close" src="resources/images/closeButton.png" onclick="togglePopUpWindowAreaVisibility('div_registerationPopUp');" alt="closeButton" />
						<h2>הרשמה</h2>
					</div>
					<div id="div_registerationWindowContent">
						<br />
						<br />
						<form id="form_registeration" method="POST" action="PHP/register.php">
							<table>
								<tr>
									<td><p><span style="color:red">*</span> שם משתמש:</p></td>
									<td class="tableData_registerationInput"><input class="loginTextBox form-control" type="text" name="userName" /></td>
								</tr>
							</table>
							<br />
							<table>
								<tr>
									<td><p><span style="color:red">*</span> סיסמה:</p></td>
									<td class="tableData_registerationInput"><input class="loginTextBox form-control" type="password" name="password" /></td>
								</tr>
							</table>
							<br />
							<table>
								<tr>
									<td><p><span style="color:red">*</span> אימות סיסמה:</p></td>
									<td class="tableData_registerationInput"><input class="loginTextBox form-control" type="password" name="passwordRepeat" /></td>
								</tr>
							</table>
							<br />
							<br />
							<table>
								<tr>
									<td><p>  שם פרטי:</p></td>
									<td class="tableData_registerationInput"><input class="loginTextBox form-control" type="text" name="privateName" /></td>
								</tr>
							</table>
							<br />
							<table>
								<tr>
									<td><p>  שם משפחה:</p></td>
									<td class="tableData_registerationInput"><input class="loginTextBox form-control" type="text" name="familyName" /></td>
								</tr>
							</table>
							<br />
							<table>
								<tr>
									<td><p>  אימייל:</p></td>
									<td class="tableData_registerationInput"><input class="loginTextBox form-control" type="text" name="emailAddress" /></td>
								</tr>
							</table>
							<br />
							<br />
							<p style="color:red">* שדות חובה</p>
							<button class="btn btn-success btn-block" name="submit">הרשמה</button>
						</form>
						<?php
							if (isset($_COOKIE['registeration_status'])) {
								echo
									'<br />';
								echo
									'<p style="color:black; background-color:#ff9696; font-weight:bold;">' . $_COOKIE['registeration_status'] . '</p>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
		<script src="JS/script.js"></script>
	</body>
</html>
