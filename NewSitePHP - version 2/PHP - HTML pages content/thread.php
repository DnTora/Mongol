							<td style="vertical-align:top">
								<div id="div_pageNavigationGuide">
<!--//////////////////////////////////////////////////// PAGE NAVIGATION GUIDE ///////////////////////////////////////////////////-->
										<p><a href="index.php">דף הבית</a> > <a href="forum.php">פורום</a> > אשכול</p>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
								</div>
								<div id="div_pageContent">
<!--//////////////////////////////////////////////////////// PAGE CONTENT ////////////////////////////////////////////////////////-->
									<?php
										include_once 'PHP/databaseConnect.php';
										include_once 'PHP/queries/queries_thread.php';
										$threadExist = false;
										$userLoggedIn = false;
										$ownerOfThread = false;
										$row_thread = '';
										if (isset($_GET['threadId'])) {
											if (ctype_digit($_GET['threadId'])) {
												$threadExist = isThreadExist($databaseConnect, $_GET['threadId']);
												if ($threadExist) {
													$result_thread = getThreadInformation($databaseConnect, $_GET['threadId']);
													$row_thread = mysqli_fetch_assoc($result_thread);
													if (isset($_SESSION['userAccountNumber'])) {
														$userLoggedIn = true;
														if ($_SESSION['userAccountNumber'] == $row_thread['user_account_number'])
															$ownerOfThread = true;
													}
													echo '<h3>אשכול מספר ' . $_GET['threadId'] . '</h3>';
													if ($userLoggedIn) {
														echo '<img id="imageButton_newThreadMessage" src="resources/images/newThreadMessageButton.png" onclick="togglePopUpWindowAreaVisibility(\'div_newThreadMessagePopUp\')"></img>';
														if ($ownerOfThread)
															echo '<img id="imageButton_deleteThread" src="resources/images/threadDeleteButton.png" onclick="togglePopUpWindowAreaVisibility(\'div_threadDeletePopUp\')"></img>';
													}
													else
														echo '<p>אנא התחברו או הרשמו לאתר כדי שתוכלו להגיב לאשכול</p>';
												} else
													echo '<p>שימו לב! האשכול אליו ניסיתם להגיע הוסר או שאינו קיים!</p>';
											} else
												echo '<p>שימו לב! מספר האשכול לא תקין!</p>';
										} else
											echo '<p>שימו לב! אירעה שגיאה!</p>';
									?>
									<hr />
									<div id="div_thread">
										<?php
											if ($threadExist) {
												$userName = getUserName($databaseConnect, $row_thread['user_account_number']);
												echo
													'<div id="div_threadDetails">
														<div id="div_threadTitle">
															<table style="width:100%">
																<tr>
																	<td><h4>' . $row_thread['thread_title'] . '</h4></td>
																	<td style="float:left">
																		<h5>' . $userName . '</h5>
																		<script>
																			var time = new Date(' . strtotime($row_thread['thread_date']) . ' * 1000);
																			document.write("<h6 style=\"float:left\">" + time.toLocaleString() + "</h6>");
																		</script>
																	</td>
																</tr>
															</table>
														</div>
														<div id="div_threadContent">
															<p>' . $row_thread['thread_content'] . '</p>
														</div>
													</div>
													<hr />';
												
												if (!isThreadEmpty($databaseConnect, $_GET['threadId'])) {
													$result_threadMessages = getThreadMessagesInformation($databaseConnect, $_GET['threadId']);
													while ($row_threadMessages = mysqli_fetch_assoc($result_threadMessages)) {
														$userName = getUserName($databaseConnect, $row_threadMessages['user_account_number']);
														echo
															'<div class="div_threadMessage">
																<div class="div_messageTitle">
																	<table style="width:100%">
																		<tr>
																			<td>
																				<h4>' . $row_threadMessages['message_title'] . '</h4>
																			</td>';
														if ($userLoggedIn) {
															if ($_SESSION['userAccountNumber'] == $row_threadMessages['user_account_number']) {
																echo
																			'<td style="float:left">
																				<form class="form_messageDelete" method="POST" action="PHP/messageDelete.php">
																					<input type="hidden" name="messageId" value="' . $row_threadMessages['message_id'] . '"/>
																					<button name="submit" style="background:url(resources/images/messageDeleteButton.png) no-repeat; border:0px; width:30px; height:30px;"></button>
																				</form>
																			</td>';
															}
														}
														echo
																			'<td style="float:left">
																				<h5>' . $userName . '</h5>
																				<script>
																					var time = new Date(' . strtotime($row_threadMessages['message_date']) . ' * 1000);
																					document.write("<h6 style=\"float:left\">" + time.toLocaleString() + "</h6>");
																				</script>
																			</td>
																		</tr>
																	</table>
																</div>
																<div class="div_messageContent">
																	<p>' . $row_threadMessages['message_content'] . '</p>
																</div>
															</div>';
													}
												} else
													echo '<p class="paragraph_zeroContentAlert">אין הודעות באשכול!</p>';
											}
										?>
									</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--///////////////////////////////////////////////////// HIDDEN PAGE CONTENT ////////////////////////////////////////////////////-->
									<?php
										if ($threadExist && $userLoggedIn) {
											echo
												'<div id="div_newThreadMessagePopUp">
													<div id="div_newThreadMessageWindow">
														<div id="div_newThreadMessageWindowTitle" align="center">
															<image class="imageButton_close" src="resources/images/closeButton.png" onclick="togglePopUpWindowAreaVisibility(\'div_newThreadMessagePopUp\')"></image>
															<h2>הודעה חדשה</h2>
														</div>
														<div id="div_newThreadMessageWindowContent" align="center">
															<br />
															<br />
															<form id="form_newThreadMessage" method="POST" action="PHP/newThreadMessage.php">
																<input type="hidden" name="threadId" value="' . $_GET['threadId'] . '"/>
																<table style="width:90%;">
																	<tr>
																		<td><input id="textBox_newThreadMessageTitle" type="text" name="threadMessageTitle" placeholder="כותרת ההודעה" /></td>
																	</tr>
																	<tr>
																		<td><textarea id="textArea_newThreadMessageContent" name="threadMessageContent" placeholder="תוכן ההודעה"></textarea></td>
																	</tr>
																	<tr>
																		<td>
																			<br />
																			<button id="button_submitThreadMessage" name="submit">שליחה</button>
																		</td>
																	</tr>
																</table>
															</form>';
											if (isset($_COOKIE['newThreadMessage_errorData'])) { // !!!!!!!!!!!!!!!!!!!!!!!!
												echo '<br />';
												echo '<p style="color:black; background-color:red; font-weight:bold;">' . $_COOKIE['newThreadMessage_errorData'] . '</p>';
											}
											echo		'</div>
													</div>
												</div>';
										}
									?>
									<?php
										if ($threadExist && $userLoggedIn && $ownerOfThread) {
											echo
												'<div id="div_threadDeletePopUp">
													<div id="div_threadDeleteWindow">
														<div id="div_threadDeleteWindowTitle" align="center">
															<image class="imageButton_close" src="resources/images/closeButton.png" onclick="togglePopUpWindowAreaVisibility(\'div_threadDeletePopUp\')"></image>
															<h2>מחיקת אשכול</h2>
														</div>
														<div id="div_threadDeleteWindowContent" align="center">
															<br />
															<br />
															<p>האם למחוק את האשכול?</p>
															<form id="form_threadDelete" method="POST" action="PHP/threadDelete.php">
																<input type="hidden" name="threadId" value="' . $row_thread['thread_id'] . '"/>
																<table>
																	<tr>
																		<td><button name="submit" style="background:url(resources/images/okButton.png) no-repeat; border:0px; width:50px; height:30px; float:left;"></button></td>
																		<td><img src="resources/images/cancelButton.png" style="cursor:pointer; border:0px; float:left;" onclick="togglePopUpWindowAreaVisibility(\'div_threadDeletePopUp\')" />
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
							</td>
						</tr>
					</table>
				</div>
			</main>
