<?php

// test email

require_once 'logino_functions.php'; 

$admin_email = getLoginoAppConfig('admin_email', 'contact@dmrsoft.com');

$base_url = getLoginoAppConfig('base_url', 'http://dmrsoft.com');

if (substr($base_url, -1) != '/')
{		
	$base_url = $base_url . '/';
}

$subject = "LoginO Administrator: Test Email";	

$headers = "From: " . strip_tags($admin_email) . "\r\n";
$headers .= "Reply-To: ". strip_tags($admin_email) . "\r\n";		
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";			

mb_internal_encoding("UTF-8");

$message = "<html><body>Dear Friend, " . "<br/><br/> " ."\r\n" .
			 "This is test email." . " <br/> " ."\r\n" .
			 "Regards, " . " <br/> " ."\r\n" .
			 "LoginO.</body></html>";		
			 
$to_email = "some_your@email_here.com";
			 
if (!mail($to_email, "$subject", $message, $headers))
{
	echo "Failure!";
}
else
{
	echo "Success!";
}	


?>