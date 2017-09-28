<?php
	$status = '';
	if(isset($_POST['submit'])) {
		if (empty($_POST['fullName']) || empty($_POST['emailAddress'])) {
			setcookie("order_status", "שימו לב: אחד או יותר משדות החובה לא מולאו!", time() + 10, "/");
			$status = 'order=empty';
		} elseif (!empty($_POST['phoneNumber']) && !preg_match("/([0-9])/", $_POST['phoneNumber'])) {
			setcookie("order_status", "שימו לב: מספר הטלפון לא תקין!", time() + 10, "/");
			$status = 'order=invalidPhoneNumber';
		} else {
			//$targetMail = "cswebsite.official@gmail.com"; // כתובת האימייל שאליה תישלח ההודעה
			$targetMail = "matana0000@gmail.com";
			$message_title = "הודעה שהתקבלה מאתר Sics";
			$message_content = "הודעה בנושא הזמנת ספרים" . "\n" . "\n";
			$message_content .= "שם מלא: " . $_POST['fullName'] . "\n";
			$message_content .= "אימייל: " . $_POST['emailAddress'] . "\n";
			$message_content .= "מספר טלפון: " . $_POST['phoneNumber'] . "\n";
			$message_content .= "הערות: " . $_POST['notes'] . "\n";
			$message_content .= "סוג רכישה: " . $_POST['purchaseType'];
			if (mail($targetMail, $message_title, $message_content)) {
				setcookie("order_status", "ההזמנה נשלחה בהצלחה!", time() + 10, "/");
				$status = 'order=success';
			} else {
				setcookie("order_status", "שימו לב: ההזמנה לא נשלחה! אנא נסו במועד מאוחר יותר.", time() + 10, "/");
				$status = 'order=sendFail';
			}
		}
	}
	header('Location: ' . $_SERVER["HTTP_REFERER"]);
	exit();
?>
