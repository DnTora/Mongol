<?php
	$status = '';
	if(isset($_POST['submit'])) {
		if (empty($_POST['fullName']) || empty($_POST['age']) || empty($_POST['emailAddress']) || empty($_POST['phoneNumber'])) {
			setcookie("order_errorData", "שימו לב: אחד או יותר משדות החובה לא מולאו!", time() + 10, "/");
			setrawcookie("order_textBoxData", $_POST['fullName'] . "|" . $_POST['age'] . "|" . $_POST['emailAddress'] . "|" . $_POST['phoneNumber'] . "|" . isset($_POST['order']) . "|" . $_POST['notes'], time() + 10, "/");
			$status = 'order=empty';
		} elseif (!isset($_POST['order'])) { // כשיש ספר חדש אז צריך להוסיף
			setcookie("order_errorData", "שימו לב: לא נבחרו פריטים להזמנה!", time() + 10, "/");
			setrawcookie("order_textBoxData", $_POST['fullName'] . "|" . $_POST['age'] . "|" . $_POST['emailAddress'] . "|" . $_POST['phoneNumber'] . "|" . isset($_POST['order']) . "|" . $_POST['notes'], time() + 10, "/");
			$status = 'order=noSelection';
		} else {
			$targetMail = "cswebsite.official@gmail.com"; // כתובת האימייל שאליה תישלח ההודעה
			$message_title = "הודעה שהתקבלה מאתר MyBooks";
			$message_content = "הודעה בנושא הזמנת ספרים" . "\n" . "\n";
			$message_content .= "שם מלא: " . $_POST['fullName'] . "\n";
			$message_content .= "גיל: " . $_POST['age'] . "\n";
			$message_content .= "אימייל: " . $_POST['emailAddress'] . "\n";
			$message_content .= "מספר טלפון: " . $_POST['phoneNumber'] . "\n";
			$message_content .= "ספרים להזמנה: " . $_POST['order'] . "\n"; // כשיש ספר חדש אז צריך להוסיף
			$message_content .= "הערות: " . $_POST['notes'];
			if (mail($targetMail, $message_title, $message_content)) {
				setcookie("order_successData", "ההזמנה נשלחה בהצלחה!", time() + 10, "/");
				$status = 'order=success';
			} else {
				setcookie("order_errorData", "שימו לב: ההזמנה לא נשלחה! אנא נסו במועד מאוחר יותר.", time() + 10, "/");
				setrawcookie("order_textBoxData", $_POST['fullName'] . "|" . $_POST['age'] . "|" . $_POST['emailAddress'] . "|" . $_POST['phoneNumber'] . "|" . isset($_POST['order']) . "|" . $_POST['notes'], time() + 10, "/");
				$status = 'order=sendFail';
			}
		}
	}
	header('Location: ' . $_SERVER["HTTP_REFERER"]);
	exit();
?>
