<?php
	include_once('Utils/DomManager.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Home.css');
	DomManager::addCSS('CSS/Strips.css');
	DomManager::addCSS('CSS/WeddingParty.css');
	DomManager::addScript('Scripts/Utils/jquery-1.8.3.min.js');
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
			<img src="Files/Images/monogram_png-24.png" />
		</div>
		<div class="Strip Strip_02 ">
			<img src="Files/Images/ourstory.png" />
			<div class="Tree  Center">
				<img src="Files/Images/tree.png" />
			</div>
		</div>
		<div class="Strip Strip_03">
				<img src="Files/Images/weddingparty.png" />
			
			<div class="WeddingParty">
				<div class="WeddingPartyRow">
					<div class="WeddingPartyCell">
						<a href="#"><div class="CellHover"></div></a>
						<img src="http://placekitten.com/100/100">
					</div>
					<div class="WeddingPartyCell">
						<a href="#"><div class="CellHover"></div></a>
						<img src="http://placekitten.com/100/100">
					</div>
					<div class="WeddingPartyCell">
						<a href="#"><div class="CellHover"></div></a>
						<img src="http://placekitten.com/100/100">
					</div>
					<div class="WeddingPartyCell">
						<a href="#"><div class="CellHover"></div></a>
						<img src="http://placekitten.com/100/100">
					</div>
					<div class="Clear"></div>
				</div>
				<div class="WeddingPartyCenterRow">
					<div class="WeddingPartyColumn">
						<div class="WeddingPartyCell">
							<a href="#"><div class="CellHover"></div></a>
							<img src="http://placekitten.com/100/100">
						</div>
						<div class="WeddingPartyCell">
							<a href="#"><div class="CellHover"></div></a>
							<img src="http://placekitten.com/100/100">
						</div>
					</div>
					
					<div class="WeddingPartyFeature">
						<img src="http://placekitten.com/204/204">
					</div>
					
					<div class="WeddingPartyColumn">
						<div class="WeddingPartyCell">
							<a href="#"><div class="CellHover"></div></a>
							<img src="http://placekitten.com/100/100">
						</div>
						<div class="WeddingPartyCell">
							<a href="#"><div class="CellHover"></div></a>
							<img src="http://placekitten.com/100/100">
						</div>
					</div>
					<div class="Clear"></div>
				</div>
				
				
				<div class="WeddingPartyRow">
					<div class="WeddingPartyCell">
						<a href="#"><div class="CellHover"></div></a>
						<img src="http://placekitten.com/100/100">
					</div>
					<div class="WeddingPartyCell">
						<a href="#"><div class="CellHover"></div></a>
						<img src="http://placekitten.com/100/100">
					</div>
					<div class="WeddingPartyCell">
						<a href="#"><div class="CellHover"></div></a>
						<img src="http://placekitten.com/100/100">
					</div>
					<div class="WeddingPartyCell">
						<a href="#"><div class="CellHover"></div></a>
						<img src="http://placekitten.com/100/100">
					</div>
					<div class="Clear"></div>
				</div>
			</div>
			
		</div>
		<div class="Strip Strip_04">
				<div class="Banner">The Day</div>
				
			<div class="PartyDetails">
				<div class="Map">
					<a href="https://maps.google.com/maps?q=Tralee+Wedding+Facility,+Mountainview+Road,+Caledon,+ON,+Canada&hl=en&sll=37.0625,-95.677068&sspn=42.581364,73.300781&oq=tralee+wedding+facility+ca&hq=Tralee+Wedding+Facility,&hnear=Mountainview+Rd,+Caledon,+Peel+Regional+Municipality,+Ontario,+Canada&t=m&z=12" target="_blank">
						<img src="Files/Images/map.png" />
					</a>
				</div>
				<div class="Details">
					<h2>Tralee Farms</h2>
					<h1>CEREMONY AT 2:45 PM</h1>
					<h1>DINNER & DANCING TO FOLLOW</h1>
					<div class="Button">
						<a href="#">
							MORE EVENT INFO
						</a>
					</div>
					<div class="Clear"></div>
					<div class="Button">
						<a href="https://maps.google.com/maps?q=Tralee+Wedding+Facility,+Mountainview+Road,+Caledon,+ON,+Canada&hl=en&sll=37.0625,-95.677068&sspn=42.581364,73.300781&oq=tralee+wedding+facility+ca&hq=Tralee+Wedding+Facility,&hnear=Mountainview+Rd,+Caledon,+Peel+Regional+Municipality,+Ontario,+Canada&t=m&z=12" target="_blank">
							DRIVING DIRECTIONS
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="Strip Strip_05">
			<img src="Files/Images/wheretostay.png" />
		</div>
		<div class="Strip Strip_06">
			<img src="Files/Images/rsvp.png" />
			<h3>
				HOPE YOU CAN SHARE IN OUR SPECIAL DAY
			</h3>
			<h3>
				<form name="ReplyCode" action="ReplyCode.php" method="post">
					<input class="Input" type="text" name="replyCode">
					REPLY CODE
				</form>
			</h3>
		</div>
		<div class="Strip Strip_07">
			<img src="Files/Images/songrequests.png" />
			<h3>
				HELP THE US BY SUGGESTING YOUR FAVOURITE TUNES
			</h3>
			<h3>
				<form name="ReplyCode" action="ReplyCode.php" method="post">
					<input class="Input" type="text" name="replyCode">
					REPLY CODE
				</form>
				
			</h3>
		</div>
		
	</body>
	<?php echo DomManager::getScripts(); ?>
</html>
