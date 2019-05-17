<?php
//require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
require("sendgrid-php/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$email = new \SendGrid\Mail\Mail(); 

$apiKey='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';
$sendgrid = new \SendGrid($apiKey);
//$sendgrid = new \SendGrid(getenv($apiKey));
?>