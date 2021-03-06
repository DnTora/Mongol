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
											echo '<p>אנא התחברו או הרשמו לאתר כדי שתוכלו ליצור אשכולות בפורום</p>';
									?>
									<hr />
									<div id="div_forum">
										<?php
											include_once 'PHP/databaseConnect.php';
											include_once 'PHP/queries/queries_forum.php';
											if (!isForumEmpty($databaseConnect)) {
												$result_threads = getAllThreadsInformation($databaseConnect);
												while ($row_threads = mysqli_fetch_assoc($result_threads)) {
													$userName = getUserName($databaseConnect, $row_threads['user_account_number']);
													echo
														'<div class="div_forumThread" onclick="location.href=\'thread.php?threadId=' . $row_threads['thread_id'] . '\'";">
															<table style="width:100%">
																<tr>
																	<td><h4>' . $row_threads['thread_title'] . '</h4></td>
																	<td style="float:left">
																		<h5>' . $userName . '</h5>
																		<script>
																			var time = new Date(' . strtotime($row_threads['thread_date']) . ' * 1000);
																			document.write("<h6 style=\"float:left\">" + time.toLocaleString() + "</h6>");
																		</script>
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
