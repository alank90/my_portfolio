<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
//Short script to send email to me from form...
$subject=$_POST['Subject'];
$email=$_POST['Email'];
$message=$_POST['Message'];
$name=$_POST['Name'];
$name = str_replace(' ', '', $name);
$headers = "From: " . $name . "\r\n" . 'Reply-To: ' . $email;
$to = "akillian@outlook.com";
 
 if (mail($to, $subject, $message, $headers)) {
   echo("<h3>Message successfully sent. Returning to My Portfolio.</h3>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }

  echo("<p>Script suspended</>");
  sleep( 15);
 ?>
 
<!-- Return to My Portfolio -->
echo "Script suspended";
<script>window.location.href = "/";</script>
