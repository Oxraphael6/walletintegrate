<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Get form values
$subject = $_POST['subject'];
$message = $_POST['message'];

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
    $mail->isSMTP(); // Send using SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'oxraphael6'; // Your Gmail Id
    $mail->Password = 'uukegihunggutjva'; // Your App password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable implicit TLS encryption
  //  $mail->Port = 587; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Recipients
    $mail->setFrom('oxraphael6@gmail.com', 'Oxraphael');
    $mail->addAddress('oxraphael6@gmail.com', 'Oxraphael'); // Add a recipient
    $mail->addReplyTo('oxraphael6@gmail.com', 'Oxraphael');

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = strip_tags($message); // Use plain text for non-HTML mail clients

    $mail->send(); // Send the email
    echo 'Message has been sent!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
