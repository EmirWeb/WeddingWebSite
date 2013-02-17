<?php
	include_once('Utils/DomManager.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Home.css');
	DomManager::addCSS('CSS/Strips.css');
	DomManager::addScript('Scripts/Utils/jquery-1.8.3.min.js');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Emir & Laura</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<link href='http://fonts.googleapis.com/css?family=Imprima' rel='stylesheet' type='text/css'>
		<?php echo DomManager::getCSS(); ?>		

	</head>
	<body>
		<div class="Menu  Center">
			<a href="#">OUR STORY</a>&nbsp;&nbsp;
			<a href="#">WEDDING PARTY</a>&nbsp;&nbsp;
			<a href="#">THE PARTY</a>&nbsp;&nbsp;
			<a href="#">WHERE TO STAY</a>&nbsp;&nbsp;
			<a href="#">RSVP</a>&nbsp;&nbsp;
			<a href="#">SONG REQUESTS</a>&nbsp;&nbsp;
		</div>
		<div class="Strip Strip_01">
			<div class="Monogram Center">
				<img src="Files/Images/monogram.png" />
			</div>
		</div>
		<div class="Strip Strip_02 ">
			<div class="Banner_02  Center">
				<img src="Files/Images/ourstory.png" />
			</div>
			<div class="Tree  Center">
				<img src="Files/Images/tree.png" />
			</div>
		</div>
		<div class="Strip Strip_03">
			<div class="Banner_03  Center">
				<img src="Files/Images/weddingparty.png" />
			</div>
		</div>
		<div class="Strip Strip_04">
			<div class="Banner_04  Center">
				<img src="Files/Images/theparty.png" />
			</div>
		</div>
		<div class="Strip Strip_05">
			<div class="Banner_05  Center">
				<img src="Files/Images/wheretostay.png" />
			</div>
		</div>
		<div class="Strip Strip_06">
			<div class="Banner_06  Center">
				<img src="Files/Images/rsvp.png" />
			</div>
		</div>
		<div class="Strip Strip_07">
			<div class="Banner_07  Center">
				<img src="Files/Images/songrequests.png" />
			</div>
		</div>
		
	</body>
	<?php echo DomManager::getScripts(); ?>
</html>
