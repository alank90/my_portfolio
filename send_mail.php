<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Important this must come before anything
require_once 'vendor/autoload.php';

//Short script to send email to me from form...
$from = $_POST['Name'];
$subject = $_POST['Subject'];
$to = "akillian@outlook.com";
/* $email = $_POST['Email']; */
$content = $_POST['Message'];
/* $from = str_replace(' ', '', $from); */
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom($from, "Example User");
$email->setSubject($subject);
$email->addTo("test@example.com", "Example User");
$email->addContent("text/plain", $content);

$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

?>

<!-- Return to My Portfolio -->

<!-- <script>window.location.href = "/";</script> -->