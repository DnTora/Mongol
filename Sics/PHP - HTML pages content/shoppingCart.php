							<td id="tableData_pageContent">
								<div id="div_pageNavigationGuide">
<!--//////////////////////////////////////////////////// PAGE NAVIGATION GUIDE ///////////////////////////////////////////////////-->
										<p><a href="index.php">דף הבית</a> > סל קניות</p>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
								</div>
								<div id="div_pageContent">
<!--//////////////////////////////////////////////////////// PAGE CONTENT ////////////////////////////////////////////////////////-->
									<h1>סל קניות</h1>
									<hr />
									<div id="div_shoppingCartItemsArea">
										<div class="div_shoppingCartItem">
											<table>
												<tr>
													<td style="width:10%; border:1px solid; padding:5px; text-align:center;">תמונת מוצר</td>
													<td style="width:70%; border:1px solid; padding:5px; text-align:center;">שם המוצר</td>
													<td style="width:10%; border:1px solid; padding:5px; text-align:center;">כמות להזמנה</td>
													<td style="border:1px solid; padding:5px; text-align:center;">הסרה מהסל</td>
												</tr>
												<tr>
													<td style="width:10%; border:1px solid; padding:5px; text-align:center;"><img src="resources/images/products/product1.png" alt="productImage" style="max-width:100%; max-height:100%;" /></td>
													<td style="width:70%; border:1px solid; padding:5px;"><p style="margin:0px;">מתכונת במדעי המחשב</p></td>
													<td style="width:10%; border:1px solid; padding:5px; text-align:center;"><input type="text" style="width:50%;" /></td>
													<td style="border:1px solid; padding:5px; text-align:center;">
														<form id="form_deleteItemFromShoppingCart" method="POST" action="PHP/shoppingCart/deleteItemFromShoppingCart.php">
															<button class="btn btn-sm btn-danger" name="submit">הסר</button>
															<input type="hidden" name="productNumber" value="" /> <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!! -->
														</form>
													</td>
												</tr>
											</table>
										</div>
									</div>
									<hr />
									<div id="div_orderArea">
										<?php
											if (isset($_COOKIE['order_status'])) {
												if ($_COOKIE['order_status'] == 'ההזמנה נשלחה בהצלחה!')
													echo '<p style="color:black; background-color:#96ff9b; font-weight:bold; text-align:center;">' . $_COOKIE['order_status'] . '</p>';
												else
													echo '<p style="color:black; background-color:#ff9696; font-weight:bold; text-align:center;">' . $_COOKIE['order_status'] . '</p>';
												echo '<br />';
											}
										?>
										<form id="form_order" method="POST" action="PHP/order/sendOrder.php">
											<table>
												<tr>
													<td><p><span style="color:red">*</span> שם מלא:</p></td>
													<td class="tableData_orderInput"><input type="text" class="form-control" name="fullName" style="width:100%" /></td>
												</tr>
											</table>
											<br />
											<table>
												<tr>
													<td><p><span style="color:red">*</span> אימייל:</p></td>
													<td class="tableData_orderInput"><input type="text" class="form-control" name="emailAddress" style="width:100%" /></td>
												</tr>
											</table>
											<br />
											<table>
												<tr>
													<td><p>  מספר טלפון:</p></td>
													<td class="tableData_orderInput"><input type="text" class="form-control" name="phoneNumber" style="width:100%" /></td>
												</tr>
											</table>
											<br />
											<table>
												<tr>
													<td><p>  הערות:</p></td>
													<td class="tableData_orderInput"><input type="text" class="form-control" name="notes" style="width:100%" /></td>
												</tr>
											</table>
											<br />
											<table>
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
									</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
								</div>
							</td>
						</tr>
					</table>
				</div>
			</main>
