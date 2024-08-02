<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = 'info@oppadelivery.com';  // Replace with your email address
    $subject = 'New Contact Form Submission';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: ' . $email . "\r\n";

    // Email body
    $email_body = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
    </head>
    <body>
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Message:</strong></p>
        <p>{$message}</p>
    </body>
    </html>
    ";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo 'Thank you for contacting us. We will get back to you soon.';
    } else {
        echo 'Sorry, something went wrong. Please try again later.';
    }
} else {
    echo 'Invalid request';
}
?>
