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

// Environment Variables set in Azure Application Settings
$user_name = getenv('APPSETTING_SENDGRID_USERNAME');
echo $user_name;
$sendgrid_password = getenv('APPSETTING_SENDGRID_PASSWORD');

require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.sendgrid.net', 25))
  ->setUsername($user_name)
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