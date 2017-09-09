<?php

/////////////////////////////////////////////////////////////////////////////
// 
// Save A New Password
//
/////////////////////////////////////////////////////////////////////////////

require_once 'logino_functions.php';

 if( isset($_POST['uobjid']) && isset($_POST['password']) && isset($_POST['confirm_password']) && ($_POST['password'] == $_POST['confirm_password']) )
 {
	$answer = saveANewPassword($_POST['uobjid'], $_POST['password']);	
	echo $answer;
 }
 else
 {
	echo 'Error!';
 }
 
?>