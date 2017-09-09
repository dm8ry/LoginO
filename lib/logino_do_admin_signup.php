<?php

/////////////////////////////////////////////////////////////////////////////
// 
// Do Admin Sign Up
//
/////////////////////////////////////////////////////////////////////////////

 require_once 'logino_functions.php';

 if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
 {
	$answer = doAdminSignUp($_POST['username'], $_POST['email'], $_POST['password'], $_POST['phone']);
	echo $answer;
 }
 else
 {
	 echo "Err_00004";
 }
 
 
?>