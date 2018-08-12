<?php
/*----------------------------------------------

Configration for sending an email

----------------------------------------------*/

// Language and Encode settings
mb_language("English");
mb_internal_encoding("UTF-8");


// Messages
define("EMAIL_TO_YOU_SUCCESS", "Your message has been sent successfully!");
define("EMAIL_TO_YOU_FAILED", "Failed to send your message. Please contact the webmaster.");

define("EMAIL_TO_QUESTIONER_SUCCESS", "Your message has been sent to you successfully!");
define("EMAIL_TO_QUESTIONER_FAILED", "Failed to send your message to you. Please contact the webmaster.");

// Your Email that will be used both in sending to a questioner and notification email to you.
define("YOUR_EMAIL", YOUREMAIL);
define("YOUR_NAME", YOURNAME);
define("YOUR_FULL_EMAIL", YOUR_NAME . "<" . YOUR_EMAIL . ">");

// Activation for "Emailing to a Questioner"
define("EMAIL_TO_QUESTIONER", true);
define("EMAIL_TO_QUESTIONER_SUBJECT", "Thank you for your inquiry");

// Questioner Information
define("QUESTIONER_SUBJECT", "You got an email");
define("QUESTIONER_FULLNAME", $_POST["fullname"]);
define("QUESTIONER_EMAIL", $_POST["email"]);
define("QUESTIONER_TEL", $_POST["tel"]);
define("QUESTIONER_PROVINCE", $_POST["province"]);
define("QUESTIONER_RADIO_BUTTONS", $_POST["optionsRadios"]);
define("QUESTIONER_CHECKBOX", implode( ", ", $_POST["checkbox"]));
define("QUESTIONER_MESSAGE", $_POST["message"]);
define("QUESTIONER_FULL_EMAIL", QUESTIONER_FULLNAME . "<" . QUESTIONER_EMAIL .">");



/*----------------------------------------------

A notification email sent to you

----------------------------------------------*/
$const = get_defined_constants();
$to_you_header = "Content-Type: text/plain \r\n";
$to_you_header .= "Return-Path: " . QUESTIONER_EMAIL . " \r\n";
$to_you_header .= "From: " . QUESTIONER_FULL_EMAIL ." \r\n";
$to_you_header .= "Sender: " . QUESTIONER_EMAIL ." \r\n";
$to_you_header .= "Reply-To: " . QUESTIONER_FULL_EMAIL . " \r\n";
$to_you_header .= "Organization: " . QUESTIONER_EMAIL . " \r\n";
$to_you_header .= "X-Sender: " . QUESTIONER_EMAIL . " \r\n";
$to_you_header .= "X-Priority: 3 \r\n";
$to_you_massage = <<<__EOD__
You received the following message from your customer.

-----------------------------
Full Name : {$const['QUESTIONER_FULLNAME']}
Email : {$const['QUESTIONER_EMAIL']}
Tel : {$const['QUESTIONER_TEL']}
Province : {$const['QUESTIONER_PROVINCE']}
Radio buttons : {$const['QUESTIONER_RADIO_BUTTONS']}
Checkbox : {$const['QUESTIONER_CHECKBOX']}
Message : 
{$const['QUESTIONER_MESSAGE']}
-----------------------------

This email is sent to you automatically by the system.
__EOD__;

/*----------------------------------------------
 
A confirmation email sent to users automatically

----------------------------------------------*/

$to_questioner_header = "Content-Type: text/plain \r\n";
$to_questioner_header .= "Return-Path: " . YOUR_EMAIL . " \r\n";
$to_questioner_header .= "From: " . YOUR_FULL_EMAIL ." \r\n";
$to_questioner_header .= "Sender: " . YOUR_EMAIL ." \r\n";
$to_questioner_header .= "Reply-To: " . YOUR_FULL_EMAIL . " \r\n";
$to_questioner_header .= "Organization: " . YOUR_NAME . " \r\n";
$to_questioner_header .= "X-Sender: " . YOUR_EMAIL . " \r\n";
$to_questioner_header .= "X-Priority: 3 \r\n";
$to_questioner_body = <<<__EOD__
Dear {$const['QUESTIONER_FULLNAME']},

Thank you for your inquiry.
We review your message and respond to you as soon as possible.

Support Team
{$const['YOUR_NAME']}
{$const['YOUR_EMAIL']}
__EOD__;


?>