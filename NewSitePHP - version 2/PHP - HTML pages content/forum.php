							<td style="vertical-align:top">
								<div id="div_pageNavigationGuide">
<!--//////////////////////////////////////////////////// PAGE NAVIGATION GUIDE ///////////////////////////////////////////////////-->
										<p><a href="index.php">דף הבית</a> > פורום</p>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
								</div>
								<div id="div_pageContent">
<!--//////////////////////////////////////////////////////// PAGE CONTENT ////////////////////////////////////////////////////////-->
									<h1>פורום</h1>
									<?php
										echo '<br />';
										if (isset($_SESSION['userAccountNumber']))
											echo '<img id="imageButton_newThread" src="resources/images/newThreadButton.png" onclick="togglePopUpWindowAreaVisibility(\'div_newThreadPopUp\')"></img>';
										else
											echo '<p>אנא התחברו או הרשמו לאתר כדי שתוכלו לכתוב הודעות בפורום</p>';
									?>
									<hr />
									<div id="div_forum">
										<?php
											include_once 'PHP/databaseConnect.php';
											$sql = 'SELECT * FROM forum_threads ORDER BY thread_date';
											$result = mysqli_query($databaseConnect, $sql);
											if (mysqli_num_rows($result) > 0) {
												while ($row = mysqli_fetch_assoc($result)) {
													$sql2 = "SELECT user_name FROM users WHERE user_account_number = " . $row['user_account_number'];
													$result2 = mysqli_query($databaseConnect, $sql2);
													$userName = mysqli_fetch_array($result2)[0];
													echo
														'<div class="div_forumThread" onclick="location.href=\'thread.php?threadId=' . $row['thread_id'] . '\'";">
															<table style="width:100%">
																<tr>
																	<td><h4>' . $row['thread_title'] . '</h4></td>
																	<td style="float:left">
																		<h5>' . $userName . '</h5>
																		<h6 style="float:left">' . $row['thread_date'] . '</h6>
																	</td>
																</tr>
															</table>
														</div>';
												}
											} else {
												echo '<p class="paragraph_zeroContentAlert">אין הודעות בפורום!</p>';
											}
										?>
									</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--///////////////////////////////////////////////////// HIDDEN PAGE CONTENT ////////////////////////////////////////////////////-->
									<div id="div_newThreadPopUp">
										<div id="div_newThreadWindow">
											<div id="div_newThreadWindowTitle" align="center">
												<image class="imageButton_close" src="resources/images/closeButton.png" onclick="togglePopUpWindowAreaVisibility('div_newThreadPopUp');"></image>
												<h2>אשכול חדש</h2>
											</div>
											<div id="div_newThreadWindowContent" align="center">
												<br />
												<br />
												<form id="form_newThread" method="POST" action="PHP/newThread.php">
													<table style="width:90%;">
														<tr>
															<td><input id="textBox_newThreadTitle" type="text" name="threadTitle" placeholder="כותרת האשכול" /></td>
														</tr>
														<tr>
															<td><textarea id="textArea_newThreadContent" name="threadContent" placeholder="תוכן האשכול"></textarea></td>
														</tr>
														<tr>
															<td>
																<br />
																<button id="button_submitThread" name="submit">שליחה</button>
															</td>
														</tr>
													</table>
												</form>
												<?php
													if (isset($_COOKIE['newThread_errorData'])) { // !!!!!!!!!!!!!!!!!!!!!!!!
														echo
															'<br />';
														echo
															'<p style="color:black; background-color:red; font-weight:bold;">' . $_COOKIE['newThread_errorData'] . '</p>';
													}
												?>
											</div>
										</div>
									</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
								</div>
							</td>
						</tr>
					</table>
				</div>
			</main>
