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
												if (isset($_COOKIE['login_status']))
													$alert_htmlCode = '<p style="color:black; background-color:#ff9696; font-weight:bold; margin:0px;">' . $_COOKIE['login_status'] . '</p>';
												echo
													'<form id="form_login" method="POST" action="PHP/login.php">
														<table id="table_loginAreaFields">
															<tr>
																<td style="width:15%"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span></td>
																<td><input class="form-control" type="text" name="userName" placeholder="שם משתמש" style="height:100%; width:100%; border-radius:0px" /></td>
															</tr>
															<tr>
																<td style="width:15%"><span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span></td>
																<td><input class="form-control" type="password" name="password" placeholder="סיסמה" style="height:100%; width:100%; border-radius:0px" /></td>
															</tr>
														</table>
														<table id="table_loginAreaButtons">
															<tr>
																<td><button class="btn btn-sm btn-primary btn-block" name="submit" style="border-radius:0px">התחברות</button></td>
																<td><input class="btn btn-sm btn-primary btn-block" type="button" value="הרשמה" onclick="togglePopUpWindowAreaVisibility(\'div_registerationPopUp\');" style="border-radius:0px" /></td>
															</tr>
														</table>
													</form>'
													. $alert_htmlCode;
											} else {
												echo
													'<div id="div_loginAreaWelcomeMessage">
														<p>ברוך הבא, ' . $_SESSION['userName'] . '</p>
														<hr />
														
													</div>
													<form method="POST" action="PHP/logout.php">
														<button class="btn btn-sm btn-primary" id="button_logout" name="submit">התנתקות</button>
													</form>';
											}
										?>
									</div>
								</div>
							</td>
