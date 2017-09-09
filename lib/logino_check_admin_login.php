<?php

/////////////////////////////////////////////////////////////////////////////
// 
// Check Admin Login
//
/////////////////////////////////////////////////////////////////////////////

 require_once 'logino_functions.php';

 if(isset($_POST['username']) && isset($_POST['password']))
 {
	$answer = checkAdminLogin($_POST['username'], $_POST['password']);
	echo $answer;
 }
 else
 {
	 echo "Err_00000";
 }
 
 
?>