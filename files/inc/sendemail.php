<?php

// Define some constants
define("RECIPIENT_NAME", "Sundar");
define("RECIPIENT_EMAIL", "enquiry@aqualandpumps.com");

// Read and sanitize the form values
function sanitize_input($input) {
    return preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $input);
}

$success = false;
$name = isset($_POST['name']) ? sanitize_input($_POST['name']) : "";
$senderEmail = isset($_POST['email']) ? sanitize_input($_POST['email']) : "";
$phone = isset($_POST['phone']) ? sanitize_input($_POST['phone']) : "";
$services = isset($_POST['services']) ? sanitize_input($_POST['services']) : "";
$subject = isset($_POST['subject']) ? sanitize_input($_POST['subject']) : "";
$address = isset($_POST['address']) ? sanitize_input($_POST['address']) : "";
$website = isset($_POST['website']) ? sanitize_input($_POST['website']) : "";
$message = isset($_POST['message']) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message']) : "";

$mail_subject = 'A contact request send by ' . $name;

$body = "Name: {$name}\r\n";
$body .= "Email: {$senderEmail}\r\n";
$body .= $phone ? "Phone: {$phone}\r\n" : "";
$body .= $services ? "Services: {$services}\r\n" : "";
$body .= $subject ? "Subject: {$subject}\r\n" : "";
$body .= $address ? "Address: {$address}\r\n" : "";
$body .= $website ? "Website: {$website}\r\n" : "";
$body .= "Message:\r\n{$message}";

// If all required values exist, send the email
if ($name && $senderEmail && $message) {
    $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
    $headers = "From: {$name} <{$senderEmail}>";
    $success = mail($recipient, $mail_subject, $body, $headers);
    echo "<div class='inner success'><p class='success'>Thanks for contacting us. We will contact you ASAP!</p></div>";
} else {
    echo "<div class='inner error'><p class='error'>Something went wrong. Please try again.</p></div>";
}

?>
