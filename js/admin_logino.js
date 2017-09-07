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
