<?php

/////////////////////////////////////////////////////////////////////////////
// 
// Do Reset A Password
//
/////////////////////////////////////////////////////////////////////////////

 require_once 'logino_functions.php';

 if(isset($_POST['email']))
 {
	$new_salt = doResetAPassword($_POST['email']);
	
	$answer = sendResetAPasswordEmail($new_salt);
	
	echo $answer;
 }
 else
 {
	 echo 'Err_00007';
 }

?>