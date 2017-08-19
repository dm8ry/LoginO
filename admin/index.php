<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">	

	<link rel="stylesheet" href="./../css/bootstrap.min.css"> 
	<link href="./../css/font-awesome.css" rel="stylesheet">	
	<link rel="stylesheet" type="text/css" href="./../css/adm_style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300" rel='stylesheet' type='text/css'>

	<title>Logino</title>
	
</head>

<body>

	<div class="container">	
		<div class="row">		
			<div class="col-sm-3">
			</div>		
			<div class="col-sm-6 central-container">
				<img src="./../img/admin_login_imgage_2.png">
				<div class="login">Logino</div>
				<br/>
				<form autocomplete="off">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="username" type="text" class="form-control" name="username" placeholder="Enter Username">						
					</div>
					<br/>
					<div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					  <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password">
					</div>
					<br/>
					<button type="submit" class="btn btn-default log-in-btn">Log In</button>
					<hr/>				
					  <div class="row">
						<div class="col-sm-6"><span class="pull-left"><a href="#">Forgot password?</a></span></div>						
						<div class="col-sm-6"><span class="pull-right"><a href="#">Sign Up</a></span></div>
					  </div>					  
					<br/>					
				</form>
			</div>			
			<div class="col-sm-3">
			</div>						
		</div>		
	</div>	
	
	
    <footer class="footer">
      <div class="container">
		 <span class="pull-left">&copy; DmR<i>soft</i>, 2017</span>
        <span class="pull-right"><a href="https://github.com/dmrsoft/logino" target="_blank">dmrsoft/Logino</a></span>
      </div>
    </footer>
 
	
</body>
</html>