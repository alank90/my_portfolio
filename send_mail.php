<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

//Short script to send email to me from form...
$subject=$_POST['Subject'];
$email=$_POST['Email'];
$body=$_POST['Message'];
$name=$_POST['Name'];
$name = str_replace(' ', '', $name);
$headers = "From: " . $name . "\r\n" . 'Reply-To: ' . $email;
$to = "akillian@outlook.com";

require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.sendgrid.net', 25))
  ->setUsername('azure_8c614a57ee343b9ea0df1807d80bc688@azure.com')
  ->setPassword('SendGrid2017')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['john@doe.com' => 'John Doe'])
  ->setTo(['akillian@outlook.com' => 'Alan Killian'])
  ->setBody('Here is the message itself')
  ;
// Send the message
$result = $mailer->send($message);

?>

<!-- Return to My Portfolio -->

<!-- <script>window.location.href = "/";</script> -->