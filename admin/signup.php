<?php session_start(); 

require_once('./../lib/logino_functions.php');

$lang=load_translations();

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Logino">
	<meta name="keywords" content="Logino, Logino">
    <meta name="author" content="Author">	

	<link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
	<link rel="manifest" href="/icons/manifest.json">
	<link rel='shortcut icon' type='image/x-icon' href='/icons/favicon.ico' />
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">	

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="./../css/bootstrap.min.css"> 
	<link href="./../css/font-awesome.css" rel="stylesheet">	
	<link rel="stylesheet" type="text/css" href="./../css/adm_style.css">	
	<link rel="stylesheet" type="text/css" href="./../css/jquery.flipcountdown.css" />
				
	<script type="text/javascript" src="./../js/admin_logino.js"></script>

	<title>Logino | Sign Up</title>
	
</head>

<body>

	<?php include_once('header.php'); ?>

	<div class="container">	
		<div class="row">		
			<div class="col-sm-3">
			</div>		
			<div class="col-sm-6 central-container">
				<a href="index.php"><img src="./../img/admin_login_imgage_2.png"></a>
				<div class="login"><span style="color: red; font-style: normal;">Login</span><span style="color: white">O</span> | <span class="sub-title-container"><?php echo $lang->getTranslation('SIGN_UP_SU'); ?></span></div>
				<br/>
				<form autocomplete="off" method="post" name="frmAdminSignUp" id="frmAdminSignUp" enctype="multipart/form-data">
					<div id="alert_username" class="alert alert-warning" style="display: none;">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="username" type="text" class="form-control" name="username" placeholder="<?php echo $lang->getTranslation('ENTER_USERNAME_SU'); ?>">						
					</div>
					<br/>
					<div id="alert_email" class="alert alert-warning" style="display: none;">
					</div>					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						<input id="email" type="text" class="form-control" name="email" placeholder="<?php echo $lang->getTranslation('ENTER_PASSWORD_SU'); ?>">						
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
						<input id="phone" type="text" class="form-control" name="phone" placeholder="<?php echo $lang->getTranslation('ENTER_PHONE_SU'); ?>">						
					</div>
					<br/>
					<div id="alert_password" class="alert alert-warning" style="display: none;">
					</div>						
					<div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					  <input id="password" type="password" class="form-control" name="password" placeholder="<?php echo $lang->getTranslation('ENTER_PASSWORD_SU'); ?>">
					</div>
					<br/>
					<!--
					<div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					  <input id="confirm_password" type="password" class="form-control" name="password" placeholder="Confirm Password">
					</div>
					<br/>
					-->
					<input type="hidden" name="err_msg1" id="err_msg1" value="<?php echo $lang->getTranslation('ERROR_NO_USERNAME_PROVIDED_SU'); ?>">
					<input type="hidden" name="err_msg2" id="err_msg2" value="<?php echo $lang->getTranslation('ERROR_USERNAME_IS_TOO_SHORT_SU'); ?>">
					<input type="hidden" name="err_msg3" id="err_msg3" value="<?php echo $lang->getTranslation('ERROR_NO_EMAIL_PROVIDED_SU'); ?>">
					<input type="hidden" name="err_msg4" id="err_msg4" value="<?php echo $lang->getTranslation('ERROR_EMAIL_IS_TOO_SHORT_SU'); ?>">
					<input type="hidden" name="err_msg5" id="err_msg5" value="<?php echo $lang->getTranslation('ERROR_NOT_VALID_EMAIL_SU'); ?>">
					<input type="hidden" name="err_msg6" id="err_msg6" value="<?php echo $lang->getTranslation('ERROR_NOT_PASSWORD_PROVIDED_SU'); ?>">
					<input type="hidden" name="err_msg7" id="err_msg7" value="<?php echo $lang->getTranslation('ERROR_PASSWORD_IS_TOO_SHORT_SU'); ?>">
					
					<button type="submit" id="btnAdminSignUp" name="btnAdminSignUp" class="btn btn-default log-in-btn" onclick='doAdminSignUp(); return false;'><?php echo $lang->getTranslation('SIGN_UP_SU'); ?></button>
					<hr/>				
					  <div class="row">
						<div class="col-sm-6">&nbsp;</div>						
						<div class="col-sm-6"><span class="pull-right"><a href="index.php"><?php echo $lang->getTranslation('LOGIN_SU'); ?></a></span></div>
					  </div>					  
					<br/>					
				</form>
			</div>			
			<div class="col-sm-3">						
			</div>						
		</div>	
	
		<?php  echo toShowDigitalClocks(); ?>
	
	</div>	
				
    <?php include_once('footer.php'); ?>
	
	<script src="./../js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="./../js/jquery.flipcountdown.js"></script>
	<script type="text/javascript" src="./../js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
	
		$(function(){
			$("#retroclockbox1").flipcountdown({
				size:"sm"
			});
		})
	
	</script>	
 
</body>
</html>