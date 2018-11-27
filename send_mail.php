<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Important this must come before anything
require_once 'vendor/autoload.php';

//Short script to send email to me from form...
$from = new SendGrid\Email(null,$_POST['Name']);
$subject = $_POST['Subject'];
$to =  new SendGrid\Email(null,"akillian@outlook.com");
$email=$_POST['Email'];
$content = new SendGrid\Content("text/plain",$_POST['Message']);
/* $from = str_replace(' ', '', $from); */
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();

?>

<!-- Return to My Portfolio -->

<script>window.location.href = "/";</script>