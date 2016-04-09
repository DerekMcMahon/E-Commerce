<?php
	session_start();

	// Include the code to send an email to the user
	include("sendmail_helper.php");

	$email = $_SESSION["email"];
	$firstName = $_SESSION["first_name"];
	$planType = $_SESSION["plan_type"];

	// Send a success email
	$subject = "Lytics Registration";
	$message = "<p style='font-size:16px; color:#222222'>";
	$message .= ucwords($firstName) . ",<br><br>";
	$message .= "Thank you for signing up for the " . ucwords(substr($planType, 5)) . " Lytics plan. Your payment has been successfully processed.<br><br>";
	$message .= "If you have any questions, contact us at lyticscompany@gmail.com.<br><br>";
	$message .= "We look forward to doing business with you!<br>";
	$message .= "The Lytics Team";
	$message .= "</p>";
	$message .= "<img src='cid:lytics_logo' alt='lytics logo' width='172px' height='40px'/>";
	sendEmail($email, $subject, $message);
?>