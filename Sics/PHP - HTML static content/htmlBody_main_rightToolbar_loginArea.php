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
														<table>
															<tr>
																<td style="width:15%"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span></td>
																<td><input class="form-control" type="text" name="userName" placeholder="שם משתמש" style="height:100%; width:100%; border-radius:0px" /></td>
															</tr>
															<tr>
																<td style="width:15%"><span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span></td>
																<td><input class="form-control" type="password" name="password" placeholder="סיסמה" style="height:100%; width:100%; border-radius:0px" /></td>
															</tr>
														</table>
														<table>
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
														<p style="text-align:center">ברוך הבא, ' . $_SESSION['userName'] . '</p>
														<hr />
														<p style="font-size:15px; padding:5px;">
															שימו לב! כדי לקבל גישה מלאה להסברים של הספר יש לרכוש אותו!
															<br />
															(כרגע יש ליצור איתנו קשר כדי לעדכן את סטטוס הרכישה בחשבון, בקרוב זה יסודר)
															<br />
															<br />
															לרשותכם 2 מתכונות חינמיות הלקוחות מתוך הספר:
														</p>
														<ul>
															<li><a href="resources/documents/matkonet1.pdf">מתכונת 1</a></li>
															<li><a href="resources/documents/matkonet2.pdf">מתכונת 2</a></li>
														</ul>
														<hr />
													</div>
													<form id="form_logout" method="POST" action="PHP/logout.php">
														<table>
															<tr>
																<td><button class="btn btn-sm btn-primary btn-block" id="button_logout" name="submit" style="border-radius:0px">התנתקות</button><td>
																<td><input class="btn btn-sm btn-default btn-block" type="button" value="שינוי פרטי חשבון" onclick="togglePopUpWindowAreaVisibility(\'div_accountUpdatePopUp\');" style="border-radius:0px" /></td>
															</tr>
														</table>
													</form>';
											}
										?>
									</div>
								</div>
							</td>
