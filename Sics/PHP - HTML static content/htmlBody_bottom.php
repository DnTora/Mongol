<!--//////////////////////////////////////////////////// HIDDEN STATIC CONTENT ///////////////////////////////////////////////////-->
			<?php
				if (!isset($_SESSION['userAccountNumber'])) {
					echo
						'<div id="div_registerationPopUp">
							<div id="div_registerationWindow">
								<div id="div_registerationWindowTitle">
									<img class="imageButton_close" src="resources/images/closeButton.png" onclick="toggleDivVisibility(\'div_registerationPopUp\');" alt="closeButton" />
									<h2 style="text-align:center">הרשמה</h2>
								</div>
								<div id="div_registerationWindowContent">';
					if (isset($_COOKIE['registeration_status'])) {
						if ($_COOKIE['registeration_status'] == 'ההרשמה בוצעה בהצלחה!')
							echo '<p style="color:black; background-color:#96ff9b; font-weight:bold; text-align:center;">' . $_COOKIE['registeration_status'] . '</p>';
						else
							echo '<p style="color:black; background-color:#ff9696; font-weight:bold; text-align:center;">' . $_COOKIE['registeration_status'] . '</p>';
					} else
						echo '<br />';
					echo			'<br />
									<form id="form_registeration" method="POST" action="PHP/register.php">
										<table>
											<tr>
												<td><p><span style="color:red">*</span> שם משתמש:</p></td>
												<td class="tableData_registerationInput"><input class="form-control" type="text" name="userName" /></td>
											</tr>
										</table>
										<br />
										<table>
											<tr>
												<td><p><span style="color:red">*</span> סיסמה:</p></td>
												<td class="tableData_registerationInput"><input class="form-control" type="password" name="password" /></td>
											</tr>
										</table>
										<br />
										<table>
											<tr>
												<td><p><span style="color:red">*</span> אימות סיסמה:</p></td>
												<td class="tableData_registerationInput"><input class="form-control" type="password" name="passwordRepeat" /></td>
											</tr>
										</table>
										<br />
										<br />
										<table>
											<tr>
												<td><p>  שם פרטי:</p></td>
												<td class="tableData_registerationInput"><input class="form-control" type="text" name="privateName" /></td>
											</tr>
										</table>
										<br />
										<table>
											<tr>
												<td><p>  שם משפחה:</p></td>
												<td class="tableData_registerationInput"><input class="form-control" type="text" name="familyName" /></td>
											</tr>
										</table>
										<br />
										<table>
											<tr>
												<td><p>  אימייל:</p></td>
												<td class="tableData_registerationInput"><input class="form-control" type="text" name="emailAddress" /></td>
											</tr>
										</table>
										<br />
										<br />
										<p style="color:red">* שדות חובה</p>
										<button class="btn btn-success btn-block" name="submit">הרשמה</button>
									</form>
								</div>
							</div>
						</div>';
				}
				
				
				if (isset($_SESSION['userAccountNumber'])) {
					include_once 'PHP/databaseConnect.php';
					$sql = "SELECT * FROM users WHERE user_account_number=" . $_SESSION['userAccountNumber'];
					$result = mysqli_query($databaseConnect, $sql);
					$row = mysqli_fetch_assoc($result);
					echo
						'<div id="div_accountUpdatePopUp">
							<div id="div_accountUpdateWindow">
								<div id="div_accountUpdateWindowTitle">
									<img class="imageButton_close" src="resources/images/closeButton.png" onclick="toggleDivVisibility(\'div_accountUpdatePopUp\');" alt="closeButton" />
									<h2 style="text-align:center">שינוי פרטי חשבון</h2>
								</div>
								<div id="div_accountUpdateWindowContent">';
					if (isset($_COOKIE['accountUpdate_status'])) {
						if ($_COOKIE['accountUpdate_status'] == 'הפרטים שונו בהצלחה!')
							echo '<p style="color:black; background-color:#96ff9b; font-weight:bold; text-align:center;">' . $_COOKIE['accountUpdate_status'] . '</p>';
						else
							echo '<p style="color:black; background-color:#ff9696; font-weight:bold; text-align:center;">' . $_COOKIE['accountUpdate_status'] . '</p>';
					} else
						echo '<br />';
					echo			'<br />
									<form id="form_accountUpdate" method="POST" action="PHP/updateAccount.php">
										<table>
											<tr>
												<td><p>  שם פרטי:</p></td>
												<td class="tableData_accountUpdateInput"><input class="form-control" type="text" name="privateName" value="' . $row['private_name'] . '" /></td>
											</tr>
										</table>
										<br />
										<table>
											<tr>
												<td><p>  שם משפחה:</p></td>
												<td class="tableData_accountUpdateInput"><input class="form-control" type="text" name="familyName" value="' . $row['family_name'] . '" /></td>
											</tr>
										</table>
										<br />
										<table>
											<tr>
												<td><p>  אימייל:</p></td>
												<td class="tableData_accountUpdateInput"><input class="form-control" type="text" name="emailAddress" value="' . $row['email_address'] . '" /></td>
											</tr>
										</table>
										<hr />
										<table>
											<tr>
												<td><p><span style="color:red">*</span> שם משתמש:</p></td>
												<td class="tableData_accountUpdateInput"><input class="form-control" type="text" name="userName" value="' . $row['user_name'] . '" /></td>
											</tr>
										</table>
										<br />
										<table>
											<tr>
												<td><p>  סיסמה חדשה:</p></td>
												<td class="tableData_accountUpdateInput"><input class="form-control" type="password" name="password" placeholder="ללא שינוי" /></td>
											</tr>
										</table>
										<br />
										<table>
											<tr>
												<td><p>  אימות סיסמה חדשה:</p></td>
												<td class="tableData_accountUpdateInput"><input class="form-control" type="password" name="passwordRepeat" placeholder="ללא שינוי" /></td>
											</tr>
										</table>
										<hr />
										<table>
											<tr>
												<td><p><span style="color:red">*</span><b> סיסמה נוכחית:</b></p></td>
												<td class="tableData_accountUpdateInput"><input class="form-control" type="password" name="currentPassword" /></td>
											</tr>
										</table>
										<br />
										<br />
										<p style="color:red">* שדות חובה</p>
										<table>
											<tr>
												<td style="width:80%"><button class="btn btn-success btn-block" name="submit">עדכון</button></td>
												<td><input class="btn btn-link btn-xs" type="button" value="מחיקת חשבון" onclick="toggleDivVisibility(\'div_accountDeleteConfirmationPopUp\');" style="color:red" /></td>
											</tr>
										</table>
									</form>
								</div>
							</div>
						</div>';
				}
				
				
				if (isset($_SESSION['userAccountNumber'])) {
					echo
						'<div id="div_accountDeleteConfirmationPopUp">
							<div id="div_accountDeleteConfirmationWindow">
								<div id="div_accountDeleteConfirmationWindowTitle">
									<img class="imageButton_close" src="resources/images/closeButton.png" onclick="toggleDivVisibility(\'div_accountDeleteConfirmationPopUp\');" alt="closeButton" />
									<h2 style="text-align:center">מחיקת חשבון</h2>
								</div>
								<div id="div_accountDeleteConfirmationWindowContent">';
					if (isset($_COOKIE['accountDeleteConfirmation_status']))
						echo '<p style="color:black; background-color:#ff9696; font-weight:bold; text-align:center;">' . $_COOKIE['accountDeleteConfirmation_status'] . '</p>';
					else
						echo '<br />';
					echo			'<br />
									<p style="text-align:center; margin-bottom:0px">האם למחוק את החשבון?</p>
									<p style="font-size:13px; text-align:center; color:red">פעולה זאת אינה ניתנת לביטול!</p>
									<br />
									<form id="form_accountDelete" method="POST" action="PHP/deleteAccount.php">
										<table>
											<tr>
												<td><p>סיסמה נוכחית:</p></td>
												<td class="tableData_accountDeleteInput"><input class="form-control" type="password" name="currentPassword" /></td>
											</tr>
										</table>
										<br />
										<br />
										<table style="width:40%; margin:auto;">
											<tr>
												<td><button name="submit" class="btn btn-danger btn-block">אישור</button></td>
												<td><input class="btn btn-primary btn-block" type="button" value="ביטול" onclick="toggleDivVisibility(\'div_accountDeleteConfirmationPopUp\');" /></td>
											</tr>
										</table>
									</form>
								</div>
							</div>
						</div>';
				}
			?>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
		</div>
		<script src="JS/script.js"></script>
	</body>
</html>
