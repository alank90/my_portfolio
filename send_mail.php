<?php
try {
//Short script to send email to me from form...
    $subject = $_POST['Subject'];
    $email = $_POST['Email'];
    $body = $_POST['Message'];
    $from = $_POST['Name'];
    $from = str_replace(' ', '', $from);
    $headers = "From: " . $from . "\r\n" . 'Reply-To: ' . $email;
    $to = "akillian@outlook.com";

// Important this must come before anything
    require_once 'vendor/autoload.php';

// Note - Env variables stored on heroku app instance in config variables
    // set from heroku dashboard. If you want to test mail method locally will
    // need to use php putenv() to set SENDGRID_USERNAME & SENDGRID_PASSWORD
    // env variables locally
    $sendgrid_username = getenv('SENDGRID_USERNAME');
    $sendgrid_password = getenv('SENDGRID_PASSWORD');

// Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.sendgrid.net', 587, 'tls'))
        ->setUsername($sendgrid_username)
        ->setPassword($sendgrid_password)
    ;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message($subject))
        ->setFrom([$email => $from])
        ->setTo([$to => 'Alan Killian'])
        ->setBody($body)
    ;
// Send the message
    $mailer->send($message);
    echo "Sent email. Will return to My Portfolio momentarily.<br>";

} // End Try
 catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
?>

<!-- Return to My Portfolio -->

<script>window.location.href = "/";</script>
