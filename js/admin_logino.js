
// validateEmail

function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

// doAdminLogin

function doAdminLogin()
{
	var nErrors = 0;
	
	document.getElementById("alert_username").innerHTML = "";
	document.getElementById("alert_username").style.display = "none";		
	document.getElementById("alert_password").innerHTML = "";
	document.getElementById("alert_password").style.display = "none";	
		
	if (document.getElementById("username").value==null || document.getElementById("username").value=="")
	{
		document.getElementById("alert_username").innerHTML = "Error! No username provided!";
		document.getElementById("alert_username").style.display = "block";
		nErrors++;
	}	
	else if (document.getElementById("username").value.length < 5)
	{
		document.getElementById("alert_username").innerHTML = "Error! Username is too short!";
		document.getElementById("alert_username").style.display = "block";
		nErrors++;
	}		
	else if (document.getElementById("password").value==null || document.getElementById("password").value=="")
	{
		document.getElementById("alert_password").innerHTML = "Error! No password provided!";
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
		var url = "./../lib/check_admin_login.php";
					
		var oData = new FormData(document.forms.namedItem("frmAdminLogIn"));
		
		var oReq = new XMLHttpRequest();
		  oReq.open("POST", url, true);
		  oReq.onload = function(oEvent) {
								
			if (oReq.status == 200) 
			{			
				// alert('>>'+oReq.responseText);

				if (oReq.responseText=='Ok') 
				{				
					window.location.replace("./../admin/success_login.php");				
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
	var nErrors = 0;
	
	document.getElementById("alert_username").innerHTML = "";
	document.getElementById("alert_username").style.display = "none";	
	document.getElementById("alert_email").innerHTML = "";
	document.getElementById("alert_email").style.display = "none";		
	document.getElementById("alert_password").innerHTML = "";
	document.getElementById("alert_password").style.display = "none";	
		
	if (document.getElementById("username").value==null || document.getElementById("username").value=="")
	{
		document.getElementById("alert_username").innerHTML = "Error! No username provided!";
		document.getElementById("alert_username").style.display = "block";
		nErrors++;
	}	
	else if (document.getElementById("username").value.length < 5)
	{
		document.getElementById("alert_username").innerHTML = "Error! Username is too short!";
		document.getElementById("alert_username").style.display = "block";
		nErrors++;
	}
	else if (document.getElementById("email").value==null || document.getElementById("email").value=="")
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
	else if (document.getElementById("password").value==null || document.getElementById("password").value=="")
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
		var url = "./../lib/do_admin_signup.php";
					
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
					window.location.replace("./../admin/wrong_signup.php");			
				} 
				return;			
				
			} else {
			  alert("Error " + oReq.status + " occurred.<br \/>");
			}
		  };

		oReq.send(oData); 
	}
}


// doAdminResetPassword

function doAdminResetPassword()
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
		var url = "./../lib/do_reset_password.php";
					
		var oData = new FormData(document.forms.namedItem("frmAdminResetPassword"));
		
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