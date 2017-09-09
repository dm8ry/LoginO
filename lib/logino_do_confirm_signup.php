<?php

/////////////////////////////////////////////////////////////////////////////
// 
// Confirm Sign Up
//
/////////////////////////////////////////////////////////////////////////////

 require_once 'logino_functions.php';

 if(isset($_GET['uobjid']))
 {
	$answer = confirmSignUp($_GET['uobjid']);
	
	if ($answer != 'Ok')
	{
		header("Location: ./../admin/index.php");  
		exit();	
	}
	else
	{
		header("Location: ./../admin/confirm_via_email.php");  
		exit();		
	}
 }
 else
 {
	header("Location: ./../admin/index.php");  
	exit();
 }
 
?>