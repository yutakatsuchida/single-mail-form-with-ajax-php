<?php

	require_once("functions.php");

	// There is no error, send an email
	if (!$errorFlag) {
		require_once("config.php");
		
		if (mb_send_mail(YOUR_EMAIL, QUESTIONER_SUBJECT, $to_you_massage, $to_you_header)) {
			// if the message is sent
			//print EMAIL_TO_YOU_SUCCESS;
		} else {
			// if the message is failed to send
			//print EMAIL_TO_YOU_FAILED;
		}

		print "<br>";

		//If AUTO_REPLY_EMAIL is enable
		if(EMAIL_TO_QUESTIONER){

			$to_questioner_body = preg_replace("/\x0D\x0A|\x0D|\x0A/", "\n", $to_questioner_body);
			if (mb_send_mail(QUESTIONER_EMAIL, EMAIL_TO_QUESTIONER_SUBJECT, $to_questioner_body, $to_questioner_header)){
				// if the message is sent
				print EMAIL_TO_QUESTIONER_SUCCESS;
			} else {
				// if the message is failed to send
				print MAIL_TO_QUESTIONER_FAILED;
			}
		}
	} else {
		// display an error message
		$msg .= "<p>Please confirm the following information.</p>";
		$msg .= "<ul>";
		foreach ($errorMessages as $errorMessage) {
			$msg .= "<li>" . $errorMessage . "</li>";
		}
		$msg .= "</ul>";
		print $msg;
	}

?>