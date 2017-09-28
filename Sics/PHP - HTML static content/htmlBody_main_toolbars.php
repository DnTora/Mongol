			<main>
				<div id="div_main">
					<table id="table_main">
						<tr id="tableRow_topToolbar_MOBILE">
							<td id="tableData_topToolbar_MOBILE" colspan="2">
								<div id="div_topTootbar_MOBILE">
									<span id="span_topToolbarHamburgerButton_MOBILE" class="glyphicon glyphicon-menu-hamburger" onclick="toggleDivVisibility('div_collapsableToolbarContent_MOBILE')"></span>
									<?php
										if (!isset($_SESSION['userAccountNumber']))
											echo '<p style="color:white; font-size:22px; margin:0px;"> התחבר/הרשם</p>';
										else
											echo '<p style="color:white; font-size:22px; margin:0px;"> מחובר למשתמש ' . $_SESSION['userName'] . '</p>';
									?>
									<div id="div_collapsableToolbarContent_MOBILE">
										<div id="div_loginArea_MOBILE">
											<?php
												if (!isset($_SESSION['userAccountNumber'])) {
													echo
														'<form id="form_login_MOBILE" method="POST" action="PHP/users/login.php">
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
																	<td><input class="btn btn-sm btn-primary btn-block" type="button" value="הרשמה" onclick="toggleDivVisibility(\'div_registerationPopUp\');" style="border-radius:0px" /></td>
																</tr>
															</table>
														</form>';
													if (isset($_COOKIE['login_status']))
														echo '<p style="color:black; background-color:#ff9696; font-weight:bold; margin:0px; text-align:center;">' . $_COOKIE['login_status'] . '</p>';
												} else {
													echo
														'<div id="div_loginAreaWelcomeMessage_MOBILE">
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
														<form id="form_logout_MOBILE" method="POST" action="PHP/users/logout.php">
															<table>
																<tr>
																	<td><button class="btn btn-sm btn-primary btn-block" name="submit" style="border-radius:0px">התנתקות</button><td>
																	<td><input class="btn btn-sm btn-default btn-block" type="button" value="שינוי פרטי חשבון" onclick="toggleDivVisibility(\'div_accountUpdatePopUp\');" style="border-radius:0px" /></td>
																</tr>
															</table>
														</form>';
												}
											?>
										</div>
										<div id="div_shoppingCart_MOBILE">
											<p style="font-size:17px; margin:0px;">
												<?php
													if (!isset($_COOKIE["shoppingCart_data"]))
														echo 'אין פריטים בסל הקניות';
													else {
														include_once 'PHP/shoppingCart/functions_shoppingCart.php';
														$itemCount = getShoppingCartItemsCount();
														echo
															'יש ' . $itemCount . ' פריטים בסל הקניות
															<br />
															<a href="shoppingCart.php">המשך לסל הקניות</a>';
													}
												?>
											</p>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td id="tableData_rightToolbar_DESKTOP">
								<div id="div_rightTootbar_DESKTOP">
									<div id="div_loginArea_DESKTOP">
										<?php
											if (!isset($_SESSION['userAccountNumber'])) {
												echo
													'<form id="form_login_DESKTOP" method="POST" action="PHP/users/login.php">
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
																<td><input class="btn btn-sm btn-primary btn-block" type="button" value="הרשמה" onclick="toggleDivVisibility(\'div_registerationPopUp\');" style="border-radius:0px" /></td>
															</tr>
														</table>
													</form>';
												if (isset($_COOKIE['login_status']))
													echo '<p style="color:black; background-color:#ff9696; font-weight:bold; margin:0px; text-align:center;">' . $_COOKIE['login_status'] . '</p>';
											} else {
												echo
													'<div id="div_loginAreaWelcomeMessage_DESKTOP">
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
													<form id="form_logout_DESKTOP" method="POST" action="PHP/users/logout.php">
														<table>
															<tr>
																<td><button class="btn btn-sm btn-primary btn-block" name="submit" style="border-radius:0px">התנתקות</button><td>
																<td><input class="btn btn-sm btn-default btn-block" type="button" value="שינוי פרטי חשבון" onclick="toggleDivVisibility(\'div_accountUpdatePopUp\');" style="border-radius:0px" /></td>
															</tr>
														</table>
													</form>';
											}
										?>
									</div>
									<div id="div_shoppingCart_DESKTOP">
										<p style="font-size:17px; margin:0px;">
											<?php
												if (!isset($_COOKIE["shoppingCart_data"]))
													echo 'אין פריטים בסל הקניות';
												else {
													include_once 'PHP/shoppingCart/functions_shoppingCart.php';
													$itemCount = getShoppingCartItemsCount();
													echo
														'יש ' . $itemCount . ' פריטים בסל הקניות
														<br />
														<a href="shoppingCart.php">המשך לסל הקניות</a>';
												}
											?>
										</p>
									</div>
								</div>
							</td>
