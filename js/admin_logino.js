
// validateEmail

function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

// doAdminLogin

function doAdminLogin()
{
	
	err_msg1= document.getElementById("err_msg1").value;
	err_msg2= document.getElementById("err_msg2").value;
	err_msg3= document.getElementById("err_msg3").value;	
	
	var nErrors = 0;
	
	document.getElementById("alert_username").innerHTML = "";
	document.getElementById("alert_username").style.display = "none";		
	document.getElementById("alert_password").innerHTML = "";
	document.getElementById("alert_password").style.display = "none";	
		
	if (document.getElementById("username").value==null || document.getElementById("username").value=="")
	{
		document.getElementById("alert_username").innerHTML = err_msg1; // "Error! No username provided!";
		document.getElementById("alert_username").style.display = "block";
		nErrors++;
	}	
	else if (document.getElementById("username").value.length < 5)
	{
		document.getElementById("alert_username").innerHTML = err_msg2; // "Error! Username is too short!";
		document.getElementById("alert_username").style.display = "block";
		nErrors++;
	}		
	else if (document.getElementById("password").value==null || document.getElementById("password").value=="")
	{
		document.getElementById("alert_password").innerHTML = err_msg3; // "Error! No password provided!";
		document.getElementById("alert_password").style.display = "block";
		nErrors++;
	}	
	else 
	{
		document.getElementById("alert_username").innerHTML = "";
		document.getElementById("alert_username").style.display = "none";		
		document.getElementById("alert_password").innerHTML = "";
		document.getElementById("alert_password").style.display = "none";
	}	
						
	if (nErrors==0)
	{					
		var url = "./../lib/logino_check_admin_login.php";
					
		var oData = new FormData(document.forms.namedItem("frmAdminLogIn"));
		
		var oReq = new XMLHttpRequest();
		  oReq.open("POST", url, true);
		  oReq.onload = function(oEvent) {
								
			if (oReq.status == 200) 
			{			
				// alert('>>'+oReq.responseText);
				
				if (oReq.responseText.indexOf("ErrorMessage") !== -1)
				{
					alert(oReq.responseText);
				}

				if (oReq.responseText.localeCompare('Ok') == 0) 
				{				
					window.location.replace("./../admin/success_login.php");				
				}
				else if (oReq.responseText.localeCompare('Err_00029') == 0) 
				{
					window.location.replace("./../admin/non_confirmed_login.php");
				}
				else if (oReq.responseText.localeCompare('Err_00030') == 0) 
				{
					window.location.replace("./../admin/disabled_user_login.php");
				}	
				else if (oReq.responseText.localeCompare('Err_00031') == 0) 
				{
					window.location.replace("./../admin/black_ip_login.php");
				}					
				else
				{
					window.location.replace("./../admin/wrong_login.php");			
				} 
				return;			
				
			} else {
			  alert("Error " + oReq.status + " occurred.<br \/>");
			}
		  };

		oReq.send(oData); 
	}
}

// doAdminSignUp

function doAdminSignUp()
{
	
	err_msg1= document.getElementById("err_msg1").value;
	err_msg2= document.getElementById("err_msg2").value;
	err_msg3= document.getElementById("err_msg3").value;
	err_msg4= document.getElementById("err_msg4").value;
	err_msg5= document.getElementById("err_msg5").value;
	err_msg6= document.getElementById("err_msg6").value;
	err_msg7= document.getElementById("err_msg7").value;
	
	var nErrors = 0;
	
	document.getElementById("alert_username").innerHTML = "";
	document.getElementById("alert_username").style.display = "none";	
	document.getElementById("alert_email").innerHTML = "";
	document.getElementById("alert_email").style.display = "none";		
	document.getElementById("alert_password").innerHTML = "";
	document.getElementById("alert_password").style.display = "none";	
		
	if (document.getElementById("username").value==null || document.getElementById("username").value=="")
	{
		document.getElementById("alert_username").innerHTML = err_msg1; // "Error! No username provided!";
		document.getElementById("alert_username").style.display = "block";
		nErrors++;
	}	
	else if (document.getElementById("username").value.length < 5)
	{
		document.getElementById("alert_username").innerHTML = err_msg2; // "Error! Username is too short!";
		document.getElementById("alert_username").style.display = "block";
		nErrors++;
	}
	else if (document.getElementById("email").value==null || document.getElementById("email").value=="")
	{
		document.getElementById("alert_email").innerHTML = err_msg3; // "Error! No email provided!";
		document.getElementById("alert_email").style.display = "block";
		nErrors++;
	}
	else if (document.getElementById("email").value.length < 5)
	{
		document.getElementById("alert_email").innerHTML =  err_msg4; // "Error! Email is too short!";
		document.getElementById("alert_email").style.display = "block";
		nErrors++;
	}	
	else if (!validateEmail(document.getElementById("email").value))
	{
		document.getElementById("alert_email").innerHTML = err_msg5; // "Error! Not Valid Email!";
		document.getElementById("alert_email").style.display = "block";
		nErrors++;
	}	
	else if (document.getElementById("password").value==null || document.getElementById("password").value=="")
	{
		document.getElementById("alert_password").innerHTML = err_msg6; // "Error! No password provided!";
		document.getElementById("alert_password").style.display = "block";
		nErrors++;
	}
	else if (document.getElementById("password").value.length < 5)
	{
		document.getElementById("alert_password").innerHTML = err_msg7; // "Error! Password is too short!";
		document.getElementById("alert_password").style.display = "block";
		nErrors++;
	}	
	else 
	{
		document.getElementById("alert_username").innerHTML = "";
		document.getElementById("alert_username").style.display = "none";	
		document.getElementById("alert_email").innerHTML = "";
		document.getElementById("alert_email").style.display = "none";		
		document.getElementById("alert_password").innerHTML = "";
		document.getElementById("alert_password").style.display = "none";
	}	
						
	if (nErrors==0)
	{					
		var url = "./../lib/logino_do_admin_signup.php";
					
		var oData = new FormData(document.forms.namedItem("frmAdminSignUp"));
		
		var oReq = new XMLHttpRequest();
		  oReq.open("POST", url, true);
		  oReq.onload = function(oEvent) {
								
			if (oReq.status == 200) 
			{			
				// alert('>>'+oReq.responseText);

				if (oReq.responseText=='Ok') 
				{				
					window.location.replace("./../admin/success_signup.php");				
				}
				else
				{
					if (oReq.responseText == 'Err_00028')
					{
						window.location.replace("./../admin/duplicate_signup.php");
					}
					else if (oReq.responseText == 'Err_00035')
					{
						window.location.replace("./../admin/duplicate2_signup.php");
					}
					else
					{
						window.location.replace("./../admin/wrong_signup.php");
					}
				} 
				return;			
				
			} else {
			  alert("Error " + oReq.status + " occurred.<br \/>");
			}
		  };

		oReq.send(oData); 
	}
}


// doAdminForgotPassword

function doAdminForgotPassword()
{
	var nErrors = 0;
	
	document.getElementById("alert_email").innerHTML = "";
	document.getElementById("alert_email").style.display = "none";	
		
	if (document.getElementById("email").value==null || document.getElementById("email").value=="")
	{
		document.getElementById("alert_email").innerHTML = "Error! No email provided!";
		document.getElementById("alert_email").style.display = "block";
		nErrors++;
	}
	else if (document.getElementById("email").value.length < 5)
	{
		document.getElementById("alert_email").innerHTML = "Error! Email is too short!";
		document.getElementById("alert_email").style.display = "block";
		nErrors++;
	}	
	else if (!validateEmail(document.getElementById("email").value))
	{
		document.getElementById("alert_email").innerHTML = "Error! Not Valid Email!";
		document.getElementById("alert_email").style.display = "block";
		nErrors++;
	}		
	else 
	{
		document.getElementById("alert_email").innerHTML = "";
		document.getElementById("alert_email").style.display = "none";	
	}	
						
	if (nErrors==0)
	{					
		var url = "./../lib/logino_do_reset_password.php";
					
		var oData = new FormData(document.forms.namedItem("frmAdminForgotPassword"));
		
		var oReq = new XMLHttpRequest();
		  oReq.open("POST", url, true);
		  oReq.onload = function(oEvent) {
								
			if (oReq.status == 200) 
			{			
				// alert('>>'+oReq.responseText);
				// return;
				
				if (oReq.responseText=='Ok') 
				{				
					window.location.replace("./../admin/success_resetpassword.php");				
				}
				else
				{
					window.location.replace("./../admin/wrong_resetpassword.php");			
				} 
				return;			
				
			} else {
			  alert("Error " + oReq.status + " occurred.<br \/>");
			}
		  };

		oReq.send(oData); 
	}
}


// doAdminResetAPassword

function doAdminResetAPassword()
{
	var nErrors = 0;
	
	document.getElementById("alert_password").innerHTML = "";
	document.getElementById("alert_password").style.display = "none";
	document.getElementById("alert_confirm_password").innerHTML = "";
	document.getElementById("alert_confirm_password").style.display = "none";	
		
	if (document.getElementById("password").value==null || document.getElementById("password").value=="")
	{
		document.getElementById("alert_password").innerHTML = "Error! No password provided!";
		document.getElementById("alert_password").style.display = "block";
		nErrors++;
	}
	else if (document.getElementById("password").value.length < 5)
	{
		document.getElementById("alert_password").innerHTML = "Error! Password is too short!";
		document.getElementById("alert_password").style.display = "block";
		nErrors++;
	}	
	else if (document.getElementById("password").value != document.getElementById("confirm_password").value)
	{
		document.getElementById("alert_confirm_password").innerHTML = "Error! Passwords are not the same!";
		document.getElementById("alert_confirm_password").style.display = "block";
		nErrors++;
	}		
	else 
	{
		document.getElementById("alert_password").innerHTML = "";
		document.getElementById("alert_password").style.display = "none";
		document.getElementById("alert_confirm_password").innerHTML = "";
		document.getElementById("alert_confirm_password").style.display = "none";	
	}	
						
	if (nErrors==0)
	{	
				
		var url = "./../lib/logino_do_save_a_new_password.php";
					
		var oData = new FormData(document.forms.namedItem("frmAdminResetAPassword"));
				
		var oReq = new XMLHttpRequest();
		  oReq.open("POST", url, true);
		  oReq.onload = function(oEvent) {
								
			if (oReq.status == 200) 
			{			
				// alert('>>'+oReq.responseText);
				  				
				if (oReq.responseText=='Ok') 
				{	
					window.location.replace("./../admin/success_savenewpassword.php");				
				}
				else
				{
					window.location.replace("./../admin/wrong_savenewpassword.php");			
				} 
				return;			
				
			} else {
			  alert("Error " + oReq.status + " occurred.<br \/>");
			}
		  };

		oReq.send(oData); 
	}	
}

function changeCurrentLanguage(the_language)
{
	
	var http = new XMLHttpRequest();
	var url = "./../lib/logino_change_current_language.php";
	var params = "the_language="+the_language;
	http.open("POST", url, true);

	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			
			// alert(http.responseText);
			// refresh the page to update languages
								
			window.location.reload(true);
		}
	}
	http.send(params);	
}