<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	$to = 'rupash.das.40@gmail.com';
	$headers = "From: $name <$email>";
	$body = "Subject: $subject\n\n$message";
	if (mail($to, $subject, $body, $headers)) {
		echo 'Your message has been sent successfully!';
	} else {
		echo 'Sorry, there was an error sending your message. Please try again later.';
	}
}
?>
