<?php
// Replace these variables with your actual SMTP server details
$smtpHost = 'smtp.hostinger.com';
$smtpPort = 465; // Change it to your SMTP port
$smtpUsername = 'assassin@aushope.online';
$smtpPassword = 'Aus@9047672441';

// Replace these variables with your actual sender and recipient details
$fromEmail = 'assassin@aushope.online';
$toEmail = 'tamilthasan11@gmail.com';
$subject = 'Test Email new new';
$message = 'This is a test email check  sent using PHP SMTP.';

// Create a message
$headers = "From: $fromEmail\r\n";
$headers .= "Reply-To: $fromEmail\r\n";
$headers .= "Content-type: text/html\r\n";

// Connect to SMTP server
$smtpConnection = fsockopen($smtpHost, $smtpPort, $errno, $errstr, 30);

if (!$smtpConnection) {
    die("Could not connect to the server. Error: $errno - $errstr");
}

// Server response
$serverResponse = fgets($smtpConnection, 515);

// Send EHLO command
fputs($smtpConnection, "EHLO $smtpHost\r\n");
$serverResponse = fgets($smtpConnection, 515);

// Start TLS if the server supports it
if (strpos($serverResponse, 'STARTTLS') !== false) {
    fputs($smtpConnection, "STARTTLS\r\n");
    $serverResponse = fgets($smtpConnection, 515);
    stream_socket_enable_crypto($smtpConnection, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
}

// Authenticate
fputs($smtpConnection, "AUTH LOGIN\r\n");
$serverResponse = fgets($smtpConnection, 515);

// Send username
fputs($smtpConnection, base64_encode($smtpUsername) . "\r\n");
$serverResponse = fgets($smtpConnection, 515);

// Send password
fputs($smtpConnection, base64_encode($smtpPassword) . "\r\n");
$serverResponse = fgets($smtpConnection, 515);

// Send MAIL FROM command
fputs($smtpConnection, "MAIL FROM: <$fromEmail>\r\n");
$serverResponse = fgets($smtpConnection, 515);

// Send RCPT TO command
fputs($smtpConnection, "RCPT TO: <$toEmail>\r\n");
$serverResponse = fgets($smtpConnection, 515);

// Send DATA command
fputs($smtpConnection, "DATA\r\n");
$serverResponse = fgets($smtpConnection, 515);

// Send email content
fputs($smtpConnection, "Subject: $subject\r\n");
fputs($smtpConnection, "$headers\r\n");
fputs($smtpConnection, "$message\r\n");
fputs($smtpConnection, ".\r\n");

// Quit
fputs($smtpConnection, "QUIT\r\n");

// Close the connection
fclose($smtpConnection);

echo "Email sent successfully!";
?>
