			<main>
				<div id="div_main">
					<table id="table_main">
						<tr>
							<td style="width:20%">
								<div id="div_rightTootbar">
									<div id="div_loginArea">
										<?php
											$alert_htmlCode = '';
											if (!isset($_SESSION['userAccountNumber'])) {
												if (isset($_COOKIE['login_errorData']))
													$alert_htmlCode = '<p style="color:black; background-color:red; font-weight:bold;">' . $_COOKIE['login_errorData'] . '</p>';
												echo
													'<form id="form_login" method="POST" action="PHP/login.php">
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
														<table>
															<tr>
																<td><button id="button_login" name="submit">התחברות</button></td>
																<td><input id="button_openRegisterationWindow" type="button" value="הרשמה" onclick="togglePopUpWindowAreaVisibility(\'div_registerationPopUp\');" /></td>
															</tr>
														</table>
													</form>'
													. $alert_htmlCode;
											} else {
												echo
													'<div id="div_loginAreaWelcomeMessage">
														<p>שלום ' . $_SESSION['privateName'] . ' ' . $_SESSION['familyName'] . '</p>
													</div>
													<form method="POST" action="PHP/logout.php">
														<button id="button_logout" name="submit">התנתקות</button>
													</form>';
											}
										?>
									</div>
