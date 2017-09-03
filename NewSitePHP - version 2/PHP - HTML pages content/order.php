							<td style="vertical-align:top">
								<div id="div_pageNavigationGuide">
<!--//////////////////////////////////////////////////// PAGE NAVIGATION GUIDE ///////////////////////////////////////////////////-->
										<p><a href="index.php">דף הבית</a> > הזמנה</p>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
								</div>
								<div id="div_pageContent">
<!--//////////////////////////////////////////////////////// PAGE CONTENT ////////////////////////////////////////////////////////-->
									<h1>הזמנה</h1>
									<hr />
									<div id="div_orderArea">
										<form id="form_order" method="POST" action="PHP/sendOrder.php">
											<table style="width:100%">
												<tr>
													<td><p><span style="color:red">*</span> שם מלא:</p></td>
													<td class="orderTextBox"><input type="text" name="fullName" style="width:100%" /></td>
												</tr>
											</table>
											<table style="width:100%">
												<tr>
													<td><p><span style="color:red">*</span> גיל:</p></td>
													<td class="orderTextBox"><input type="number" name="age" min="14" max="30" style="width:100%" /></td>
												</tr>
											</table>
											<table style="width:100%">
												<tr>
													<td><p><span style="color:red">*</span> אימייל:</p></td>
													<td class="orderTextBox"><input type="text" name="emailAddress" style="width:100%" /></td>
												</tr>
											</table>
											<table style="width:100%">
												<tr>
													<td><p><span style="color:red">*</span> מספר טלפון:</p></td>
													<td class="orderTextBox"><input type="text" name="phoneNumber" style="width:100%" /></td>
												</tr>
											</table>
											<table style="width:100%">
												<tr valign="top">
													<td><p><span style="color:red">*</span> ספרים להזמנה:</p></td>
													<td class="orderTextBox">
														<table>
															<tr><td><label><input type="checkbox" name="order" value="מתכונת במדעי המחשב" /> מתכונת במדעי המחשב</label></td></tr>
														</table>
													</td>
												</tr>
											</table>
											<table style="width:100%">
												<tr>
													<td><p> הערות:</p></td>
													<td class="orderTextBox"><input type="text" name="notes" style="width:100%" /></td>
												</tr>
											</table>
											<br />
											<p style="color:red">* שדות חובה</p>
											<button id="button_order" name="submit">הזמנה</button>
										</form>
										<?php
											if (isset($_COOKIE['order_errorData'])) {
												echo
													'<br />';
												echo
													'<p style="color:black; background-color:red; font-weight:bold;">' . $_COOKIE['order_errorData'] . '</p>';
											} elseif (isset($_COOKIE['order_successData'])) { // (?) פתרון זמני
												echo
													'<br />';
												echo
													'<p style="color:black; background-color:green; font-weight:bold;">' . $_COOKIE['order_successData'] . '</p>';
											}
										?>
									</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
								</div>
							</td>
						</tr>
					</table>
				</div>
			</main>
