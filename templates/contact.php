<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $to = 'info@soreade.com'; // Replace with your email address
    $email_subject = 'New Contact Form Submission: ' . $subject;
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $email_body = "<h2>Contact Form Submission</h2>
                   <p><strong>Email:</strong> {$email}</p>
                   <p><strong>Subject:</strong> {$subject}</p>
                   <p><strong>Message:</strong><br>{$message}</p>";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo 'Thank you for contacting us. We will get back to you soon.';
    } else {
        echo 'Sorry, something went wrong. Please try again later.';
        error_log("Mail failed to send to {$to} with subject {$email_subject}");
    }
} else {
    echo 'Invalid request';
}
?>
