<?php
	include_once('Utils/DomManager.php');
	include_once('Utils/SessionManager.php');
	include_once('Widgets/User.php');
	include_once('Widgets/Address.php');
	include_once('Widgets/Songs.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Home.css');
	DomManager::addCSS('CSS/Strips.css');
	DomManager::addCSS('CSS/Widgets/Slider.css');
	DomManager::addCSS('CSS/Widgets/Songs.css');
	DomManager::addCSS('CSS/Widgets/WeddingParty.css');
	DomManager::addCSS('CSS/Widgets/WeddingPartyOval.css');
	DomManager::addScript('//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js');
	DomManager::addScript('Scripts/Widgets/Slider.js');
	DomManager::addScript('Scripts/Home.js');
	
// 	SessionManager::clearSession();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Emir & Laura</title>
		<link rel="shortcut icon" href="Files/Images/favicon.ico" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Clicker+Script' rel='stylesheet' type='text/css'>
		<?php echo DomManager::getCSS(); ?>		
	</head>
	<body>
		<div class="Menu  Center">
			<a href="#">OUR STORY</a>
			<a href="#">WEDDING PARTY</a>
			<a href="#">THE DAY</a>
			<a href="#">WHERE TO STAY</a>
			<a href="#">RSVP</a>
			<a href="#">SONG REQUESTS</a>
		</div>
		<div class="Strip Strip_01">
			<img class="BannerImage" src="Files/Images/monogram_png-24.png" />
		</div>
		<div class="Strip Strip_02 ">
			<img class="BannerImage" src="Files/Images/ourstory.png" />
			<?php include('Widgets/Slider.php'); ?>
		</div>
		<div class="Strip Strip_03">
			<img class="BannerImage" src="Files/Images/weddingparty.png" />
			<?php include('Widgets/WeddingParty.php'); ?>
			
		</div>
		<div class="Strip Strip_04">
			<img class="BannerImage" src="Files/Images/theday.png" />
			<?php include('Widgets/PartyDetails.php'); ?>
			
		</div>
		<div class="Strip Strip_05">
			<img class="BannerImage" src="Files/Images/wheretostay.png" />
		</div>
		<div class="Strip Strip_06">
			<img class="BannerImage" src="Files/Images/rsvp.png" />
			<h3>
				HOPE YOU CAN SHARE IN OUR SPECIAL DAY
			</h3>
			<?php if (!SessionManager::isLoggedIn()) :	?>
			<h3 class="ReplyCodeForm">
				<form id="ReplyCodeRSVP" >
					<input class="Input" type="text">
					REPLY CODE
				</form>
			</h3>
			<?php else : ?>
				<?php echo User::getUsers(null); ?>
			<?php endif;?>
		</div>
		<div class="Strip Strip_07">
			<img class="BannerImage" src="Files/Images/songrequests.png" />
			<h3>
				HELP THE US BY SUGGESTING YOUR FAVOURITE TUNES
			</h3>
			<?php if (!SessionManager::isLoggedIn()) :	?>
			<h3 class="ReplyCodeForm">
				<form id="ReplyCodeSongs" >
					Reply Code<input class="Input" type="text">
					<input type="submit">
				</form>
			</h3>
			<?php else : ?>
				<?php 
					echo Songs::getSongs(null, null, false);
					DomManager::addScript('Scripts/Widgets/Songs.js');
				?>
			<?php endif;?>
		</div>
		
	</body>
	<?php echo DomManager::getScripts(); ?>
</html>
