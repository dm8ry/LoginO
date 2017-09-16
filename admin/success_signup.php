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

	<title>Logino | Congratulations, You Did It!</title>
	
</head>

<body>

	<?php include_once('header.php'); ?>

	<div class="container">	
		<div class="row">		
			<div class="col-sm-3">
			</div>		
			<div class="col-sm-6 central-container">
				<a href="index.php"><img src="./../img/admin_login_imgage_2.png"></a>
				<div class="login"><span style="color: red; font-style: normal;">Login</span><span style="color: white">O</span> | <span class="sub-title-container"><?php echo $lang->getTranslation('CONGRATS_YOU_DID_IT_SS'); ?></span></div>
				<br/>
				<form autocomplete="off">	
				  <div class="row">
					<div class="col-sm-12" style="text-align:center;"><?php echo $lang->getTranslation('CONGRATS_YOU_DID_IT_2_SS'); ?> <span style="color: red; font-weight: bold;">Login</span><span style="color: white; font-weight: bold; font-style: italic;">O</span>!</div>											
				  </div>					
					<hr/>				
					  <div class="row">
						<div class="col-sm-6"><span class="pull-left"><a href="index.php"><?php echo $lang->getTranslation('LOGIN_SS'); ?></a></span></div>						
						<div class="col-sm-6"><span class="pull-right"><a href="signup.php"><?php echo $lang->getTranslation('SIGN_UP_SS'); ?></a></span></div>
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