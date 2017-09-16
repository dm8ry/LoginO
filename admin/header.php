<?php

/////////////////////////////////////////////////
///
/// this is header
///
/////////////////////////////////////////////////
	
	require_once('./../lib/logino_functions.php');
	
	$answ = show_header();
	
	if ($answ == '1')
	{
?>
	 <div class="navbar navbar-inverse navbar-static-top" style="margin-bottom:0;" >
		<div class="container" style="font-size:15px;">
				
			<button class ="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">		
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>		
			</button>
			
			<div class="collapse navbar-collapse navHeaderCollapse">
			
				<ul class="nav navbar-nav navbar-left">			
					<li><a title="Home" href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>				
				</ul>

			  <ul class="nav navbar-nav navbar-right">
			
				<li class="dropdown">
				  <a href="#" title="Choose a Language..." class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><? echo getCurrentLanguage(); ?> <span class="caret"></span></a>
				  <ul class="dropdown-menu" style="border-radius:12px">						
						<?php echo getLanguagesNavBarDropDownMenu(); ?>
				  </ul>
				</li>
				
			  </ul>
								 
			</div> 
			
		</div> 
	 </div>
<?
	}
	
/////////////////////////////////////////////////
///
/// this is header
///
/////////////////////////////////////////////////
	
?>	 