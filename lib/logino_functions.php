<?php

/* --------- */
/* functions */
/* --------- */

require_once('db_params.php');

function isValidEmail($email)
{ 
	return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function getIP()
{
	return $_SERVER['REMOTE_ADDR'];
}

function dbOpenConnection() 
{
	
	global $db_host, $db_user, $db_pwd, $db_name;
	
	$conn = new mysqli($db_host, $db_user, $db_pwd, $db_name);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$conn->query("set names 'utf8'");	
	
	return $conn;
}

function dbCloseConnection($db_conn) 
{
	$conn->close();		
}	

function getLoginoAppConfig($par_name, $par_def_val)
{
	
	$the_value = $par_def_val;
	
	$dbConnection = dbOpenConnection();
	
	if ($dbConnection === NULL)
	{
		return 'Err_00012';
	}		
	
	$sql_app_properties = "select * from logino_app_config";
								
	$arr_app_properties = array();		
	$results_app_properties = mysqli_query($dbConnection, $sql_app_properties); 	
	
	while($line = mysqli_fetch_assoc($results_app_properties)){
		$arr_app_properties[] = $line;
		
		if ($line[the_parameter] == $par_name)
		{
			$the_value = $line[the_value];
		}
	}			
		
	return $the_value;

	dbCloseConnection($dbConnection);	

}

function checkAdminLogin($username, $pure_password)
{
	$dbConnection = dbOpenConnection();
	
	if ($dbConnection === NULL)
	{
		return 'Err_00001';
	}	
	
	// check that such user is confirmed
	
	$sql_q = "select * from logino_user where username='$username' and passw=md5('$pure_password') and is_active=1 and is_confirmed=0";		
	
	$results_q = mysqli_query($dbConnection, $sql_q); 
	
	if (!$results_q) {
		return ("ErrorMessage: %s\n".mysqli_error($dbConnection));
	}		
	
	$rowcount=mysqli_num_rows($results_q);

	if ($rowcount == 1)	
	{
		return 'Err_00029';
	}		
	
	// check that such user is non disabled
	
	$sql_q = "select * from logino_user where username='$username' and passw=md5('$pure_password') and is_active=0";		
	
	$results_q = mysqli_query($dbConnection, $sql_q); 
	
	if (!$results_q) {
		return ("ErrorMessage: %s\n".mysqli_error($dbConnection));
	}	
	
	$rowcount=mysqli_num_rows($results_q);

	if ($rowcount == 1)	
	{
		return 'Err_00030';
	}	
	
	$sql_q = "select * from logino_user where username='$username' and passw=md5('$pure_password') and is_active=1 and is_confirmed=1";
								
	$arr_q = array();		
	
	$results_q = mysqli_query($dbConnection, $sql_q); 
	
	if (!$results_q) {
		return ("ErrorMessage: %s\n".mysqli_error($dbConnection));
	}	
	
	$rowcount=mysqli_num_rows($results_q);
						
	if ($rowcount == 1)
	{
		// populate IP and last login date
		
		$ip_addr = getIP();
		
		$sql_q = "update logino_user 
					set last_login = now(),					
						last_ip = '$ip_addr'
					where username='$username' and passw=md5('$pure_password') and is_active=1 and is_confirmed=1";

		if (!mysqli_query($dbConnection, $sql_q)) {
			return ("ErrorMessage: %s\n".mysqli_error($dbConnection));
		}	
		else
		{				
			return "Ok";
		}
	}
	else
	{
		return "Err_00002";
	}
	
	dbCloseConnection($dbConnection);
}



function doAdminSignUp($username, $email, $pure_password, $phone)
{
	$dbConnection = dbOpenConnection();
	
	if ($dbConnection === NULL)
	{
		return 'Err_00005';
	}	
	
	// check that such email doesn't exist
	
	$sql_q = "select * from logino_user where upper(email) = upper('$email')";		
	
	$results_q = mysqli_query($dbConnection, $sql_q); 
	
	$rowcount=mysqli_num_rows($results_q);

	if ($rowcount != 0)	
	{
		return 'Err_00028';
	}
	
	// check that such username doesn't exist
	
	$sql_q = "select * from logino_user where upper(username) = upper('$username')";		
	
	$results_q = mysqli_query($dbConnection, $sql_q); 
	
	$rowcount=mysqli_num_rows($results_q);

	if ($rowcount != 0)	
	{
		return 'Err_00035';
	}	
		
	$unique_id = uniqid();
	
	$salt_val = md5('$email#$username#$pure_password#$unique_id');
	
	$sql_q = "INSERT INTO logino_user(username, email, passw, phone, first_name, last_name, country, city, salt_value, changed_by) 
					VALUES ('$username', '$email', md5('$pure_password'), '$phone', '', '', '', '', '$salt_val' , 'system') ";
						
	$results_q = mysqli_query($dbConnection, $sql_q); 
	
	if ($results_q === TRUE)
	{
						
		$admin_email = getLoginoAppConfig('admin_email', 'contact@dmrsoft.com');
		
		$base_url = getLoginoAppConfig('base_url', 'http://dmrsoft.com');
		
		if (substr($base_url, -1) != '/')
		{		
			$base_url = $base_url . '/';
		}
	
		$subject = "LoginO Administrator: Sign Up";	

		$headers = "From: " . strip_tags($admin_email) . "\r\n";
		$headers .= "Reply-To: ". strip_tags($admin_email) . "\r\n";		
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";			
		
		mb_internal_encoding("UTF-8");

		$message = "<html><body>Dear $username, " . "<br/><br/> " ."\r\n" .
					 "This email was sent according to your request to sign up. " . " <br/><br/> " ."\r\n" .
					 "Please follow this link to confirm your registration: <a href='". $base_url ."lib/logino_do_confirm_signup.php?uobjid=".$salt_val."' target='_blank'><b>Confirm Your Registration</b></a><br/><br/>" ."\r\n" .											
					 "Regards, " . " <br/> " ."\r\n" .
					 "LoginO.</body></html>";					
		
		if (!mail($email, "$subject", $message, $headers))
		{
			return "Err_00021";
		}
		else
		{
			return "Ok";
		}		
		
	}
	else
	{
		return "Err_00006";
	}
	
	dbCloseConnection($dbConnection);
}


function doResetAPassword($email)
{
	$dbConnection = dbOpenConnection();
	
	if ($dbConnection === NULL)
	{
		return 'Err_00008';
	}	
	
	$sql_q = "select * from logino_user where upper(email)=upper('$email') and is_active=1";
								
	$arr_q = array();		
	
	$results_q = mysqli_query($dbConnection, $sql_q); 
	
	$rowcount=mysqli_num_rows($results_q);
					
	if ($rowcount == 1)
	{
		
		$unique_id = uniqid();
		
		$new_salt = md5($unique_id.'#'.$email);
		
		$screw_password = md5('#'.$email.'#'.$unique_id);
		
		$sql_q = "update logino_user 
					set passw = '$screw_password',					
						salt_value = '$new_salt',
						changed_by = 'system',
						modify_dt = now()
					where upper(email)=upper('$email') and is_active=1";

		mysqli_query($dbConnection, $sql_q); 		
		
		return $new_salt;
	}
	else
	{
		return "Err_00009";
	}
	
	dbCloseConnection($dbConnection);		
}
		
function sendResetAPasswordEmail($salt_val)
{
	
	$dbConnection = dbOpenConnection();
	
	if ($dbConnection === NULL)
	{
		return 'Err_00010';
	}	
	
	$sql_q = "select * from logino_user where salt_value='$salt_val' and is_active=1";
								
	$arr_q = array();		
	
	$results_q = mysqli_query($dbConnection, $sql_q); 
	
	$rowcount=mysqli_num_rows($results_q);
	
	$the_email = '';
	$username = '';
	
	if ($rowcount == 1)
	{
		
		while($line = mysqli_fetch_assoc($results_q)){
			$arr_q[] = $line;
						
			$the_email = $line[email];
			$username = $line[username];
			
		}

		$admin_email = getLoginoAppConfig('admin_email', 'contact@dmrsoft.com');
		
		$base_url = getLoginoAppConfig('base_url', 'http://dmrsoft.com');
		
		if (substr($base_url, -1) != '/')
		{		
			$base_url = $base_url . '/';
		}
	
		$subject = "LoginO Administrator: Reset A Password";	

		$headers = "From: " . strip_tags($admin_email) . "\r\n";
		$headers .= "Reply-To: ". strip_tags($admin_email) . "\r\n";		
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";			
		
		mb_internal_encoding("UTF-8");

		$message = "<html><body>Dear $username, " . "<br/><br/> " ."\r\n" .
					 "This email was sent according to your request to reset password. " . " <br/><br/> " ."\r\n" .
					 "Please follow this link to reset your password: <a href='". $base_url ."admin/reset_a_password.php?uobjid=".$salt_val."' target='_blank'><b>Reset Your Password</b></a><br/><br/>" ."\r\n" .											
					 "Regards, " . " <br/> " ."\r\n" .
					 "LoginO.</body></html>";					
		
		if (!mail($the_email, "$subject", $message, $headers))
		{
			return 'Err_00018';
		}
		else
		{
			return 'Ok';
		}
		
	}
	else
	{
		return "Err_00011";
	}
	
	dbCloseConnection($dbConnection);
	
}	


function confirmSignUp($uobjid)
{

	$dbConnection = dbOpenConnection();
	
	if ($dbConnection === NULL)
	{
		return 'Err_00015';
	}		
	
	$sql_q = "select * from logino_user where salt_value='$uobjid' and is_active=1 and is_confirmed=0";
								
	$arr_q = array();		
	
	$results_q = mysqli_query($dbConnection, $sql_q); 
	
	$rowcount=mysqli_num_rows($results_q);
	
	if ($rowcount == 1)
	{
		
		while($line = mysqli_fetch_assoc($results_q)){
			$arr_q[] = $line;
						
			$the_email = $line[email];
			$username = $line[username];
			
		}		

		$sql_q = "update logino_user 
					set is_confirmed = 1,						
						changed_by = 'system',
						modify_dt = now()
					where salt_value='$uobjid' ";

		if (!mysqli_query($dbConnection, $sql_q))
		{
			return 'Err_00023';
		}
		
		$admin_email = getLoginoAppConfig('admin_email', 'contact@dmrsoft.com');
		
		$base_url = getLoginoAppConfig('base_url', 'http://dmrsoft.com');
		
		if (substr($base_url, -1) != '/')
		{		
			$base_url = $base_url . '/';
		}
	
		$subject = "LoginO Administrator: Registration Has Confirmed Successfully!";	

		$headers = "From: " . strip_tags($admin_email) . "\r\n";
		$headers .= "Reply-To: ". strip_tags($admin_email) . "\r\n";		
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";			
		
		mb_internal_encoding("UTF-8");

		$message = "<html><body>Dear $username, " . "<br/><br/> " ."\r\n" .
					 "Congratulations! You have registered successfully! " . " <br/><br/> " ."\r\n" .
					 "Now you can login: <a href='". $base_url ."admin/index.php' target='_blank'><b>LogIn</b></a><br/><br/>" ."\r\n" .											
					 "Regards, " . " <br/> " ."\r\n" .
					 "LoginO.</body></html>";					
		
		if (!mail($the_email, "$subject", $message, $headers))
		{
			return 'Err_00022';
		}
		else
		{
			return 'Ok';
		}
		
	}
	else
	{
		return "Err_00017";
	}	
	
	dbCloseConnection($dbConnection);
}

function saveANewPassword($uobjid, $new_password)
{

	$dbConnection = dbOpenConnection();
	
	if ($dbConnection === NULL)
	{
		return 'Err_00015';
	}		
	
	$sql_q = "select * from logino_user where salt_value='$uobjid' and is_active=1 and is_confirmed=1";
								
	$arr_q = array();		
	
	$results_q = mysqli_query($dbConnection, $sql_q); 
	
	$rowcount=mysqli_num_rows($results_q);
	
	if ($rowcount == 1)
	{
		
		$sql_q = "update logino_user 
					set passw = md5($new_password),						
						changed_by = 'system',
						modify_dt = now()
					where salt_value='$uobjid' ";

		if (!mysqli_query($dbConnection, $sql_q))
		{
			return 'Err_00025';
		}
	
		return 'Ok';
				
	}
	else
	{
		return "Err_00026";
	}	
	
	dbCloseConnection($dbConnection);	
	
}
	
/*----------------------------------------------------------*/	

?>