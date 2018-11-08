<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

//Short script to send email to me from form...
$subject=$_POST['Subject'];
$email=$_POST['Email'];
$body=$_POST['Message'];
$from=$_POST['Name'];
$from = str_replace(' ', '', $from);
$headers = "From: " . $from . "\r\n" . 'Reply-To: ' . $email;
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
$message = (new Swift_Message($subject))
  ->setFrom([$email => $from])
  ->setTo([$to => 'Alan Killian'])
  ->setBody($body)
  ;
// Send the message
if ($mailer->send($message))
{
  echo "Sent email. Will return to My Portfolio momentarily.\n";
  // sleep for 3 seconds
  sleep(3);
}
else
{
  echo "Email Failed. Returning to my page... \n";
  sleep(3);
}
?>

<!-- Return to My Portfolio -->

<!-- <script>window.location.href = "/";</script> -->