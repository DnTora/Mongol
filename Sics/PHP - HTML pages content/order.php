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
													<td class="tableData_orderInput"><input type="text" class="form-control" name="fullName" style="width:100%" /></td>
												</tr>
											</table>
											<br />
											<table style="width:100%">
												<tr>
													<td><p><span style="color:red">*</span> אימייל:</p></td>
													<td class="tableData_orderInput"><input type="text" class="form-control" name="emailAddress" style="width:100%" /></td>
												</tr>
											</table>
											<br />
											<table style="width:100%">
												<tr>
													<td><p>  מספר טלפון:</p></td>
													<td class="tableData_orderInput"><input type="text" class="form-control" name="phoneNumber" style="width:100%" /></td>
												</tr>
											</table>
											<br />
											<table style="width:100%">
												<tr style="vertical-align:top">
													<td><p><span style="color:red">*</span> ספרים להזמנה:</p></td>
													<td class="tableData_orderInput">
														<table>
															<tr>
																<td><label><input type="checkbox" name="order" value="מתכונת במדעי המחשב" /> מתכונת במדעי המחשב</label></td>
																<td><img src="resources/images/computer_sience_book_SMALL.png" alt="תמונה (מתכונת במדעי המחשב)" /></td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<br />
											<table style="width:100%">
												<tr>
													<td><p>  הערות:</p></td>
													<td class="tableData_orderInput"><input type="text" class="form-control" name="notes" style="width:100%" /></td>
												</tr>
											</table>
											<br />
											<table style="width:100%">
												<tr style="vertical-align:top">
													<td><p>  סוג רכישה:</p></td>
													<td class="tableData_orderInput">
														<table>
															<tr><td class="tableData_orderInput"><label><input type="radio" name="purchaseType" value="רכישה בודדת" checked /> רכישה בודדת</label></td></tr>
															<tr><td class="tableData_orderInput"><label><input type="radio" name="purchaseType" value="רכישה מרוכזת" /> רכישה מרוכזת</label></td></tr>
														</table>
													</td>
												</tr>
											</table>
											<br />
											<br />
											<p style="color:red">* שדות חובה</p>
											<button class="btn btn-success btn-block" id="button_order" name="submit">שלח בקשה להזמנה</button>
										</form>
										<?php
											if (isset($_COOKIE['order_status'])) {
												echo '<br />';
												if ($_COOKIE['order_status'] == 'ההזמנה נשלחה בהצלחה!')
													echo '<p style="color:black; background-color:#96ff9b; font-weight:bold;">' . $_COOKIE['order_status'] . '</p>';
												else
													echo '<p style="color:black; background-color:#ff9696; font-weight:bold;">' . $_COOKIE['order_status'] . '</p>';
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
