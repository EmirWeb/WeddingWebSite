<?php
	include_once('Utils/DomManager.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Home.css');
	DomManager::addCSS('CSS/Strips.css');
	DomManager::addCSS('CSS/WeddingParty.css');
	DomManager::addCSS('CSS/WeddingPartyOval.css');
	DomManager::addScript('Scripts/Utils/jquery-1.8.3.min.js');
	DomManager::addScript('Scripts/Home.js');
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
			<div class="Slider">
				<a href="javascript:void(0)" class="Chevron" id="Previous">&lt;</a>
				<div class="Center Content">
					<div class="Slide" id="Slide0">
						<span>
							<img class="Picture" src="http://placekitten.com/150/150">					
Laura and Emir met in May of 2007 while working together at Alice Fazooli's.  Although they were just friends, Laura remembers the first time she saw Emir, weaving through the booths with his head cocked to the side and arms full of dishes. He was a hard worker with a lot of integrity.  Emir remembers noticing Laura’s red lips and long hair. They worked side by side, on and off, for years without realizing they were meant to be together.						
						</span>
					</div>
					<div class="Slide Hidden" id="Slide1">
						<span>
							<img class="Picture" src="http://placekitten.com/201/200">					
It was years later that they reconnected, thanks to the wonderful world of facebook!						
						</span>
					</div>
					<div class="Slide Hidden" id="Slide2">
						<span>
							<img class="Picture" src="http://placekitten.com/201/200">					
They kept in touch this way for over a year until finally reconnecting in person over lunch at Hot House!
						</span>
					</div>
					
					<div class="Slide Hidden" id="Slide3">
						<span>
							<img class="Picture" src="http://placekitten.com/201/200">					
Laura remembered that Emir loves heavy metal. Excited about spreading the good word about the amazing Mercy Now, she invited him to a show... as friends.  Emir didn’t realize that until he arrived and noticed she also invited her siblings and a few other friends.  						
						</span>
					</div>
					<div class="Slide Hidden" id="Slide4">
						<span>
							<img class="Picture" src="http://placekitten.com/201/200">					
A week later Emir thought for sure it was a date when she invited him to see Hot Wax at the Dakota Tavern, until he saw Katie and Adam and more than a few friends were there again...  Even though Laura was oblivious to any of Emir’s true intentions, this did not stop him from telling her “I think you are beautiful”.  
						</span>
					</div>
					<div class="Slide Hidden" id="Slide5">
						<span>
							<img class="Picture" src="http://placekitten.com/201/200">					
But it wasn’t until one night in particular...  Emir took Laura to the Tim Burton Exhibit at TIFF followed by dinner at Hey Lucy.  Everything fell into place and they have been inseparable since.						
						</span>
					</div>
					<div class="Slide Hidden" id="Slide6">
						<span>
							<img class="Picture" src="http://placekitten.com/201/200">					
Emir had one last ‘test’ to pass.  After taking her Personality Assessment, she was at first surprised about what she read!  They were more similar than they thought, both high in Extraversion and Dominance and low in Conformity and Patience!  But over the following months, as they got to know each other better, they saw each other’s true colours and fell madly in love.
						</span>
					</div>
					
				</div>
				<a href="javascript:void(0)" class="Chevron" id="Next">&gt;</a>
			</div>
		
		</div>
		<div class="Strip Strip_03">
				<img class="BannerImage" src="Files/Images/weddingparty.png" />
			
			<div class="WeddingParty">
				<div class="MainWeddingPartyCell WeddingPartyCell" id="WeddingPartyCell0">
					<img src="http://placekitten.com/250/250">
					<div class="CellHover"></div>
				</div>
				<div class="WeddingPartyCell" id="WeddingPartyCell1">
					<img src="http://placekitten.com/150/150">
					<div class="CellHover"></div>
				</div>
				<div class="WeddingPartyCell" id="WeddingPartyCell2">
					<img src="http://placekitten.com/150/150">
					<div class="CellHover"></div>
				</div>
				<div class="WeddingPartyCell" id="WeddingPartyCell3">
					<img src="http://placekitten.com/150/150">
					<div class="CellHover"></div>
				</div>
				<div class="WeddingPartyCell" id="WeddingPartyCell4">
					<img src="http://placekitten.com/150/150">
					<div class="CellHover"></div>
				</div>
				<div class="WeddingPartyCell" id="WeddingPartyCell5">
					<img src="http://placekitten.com/150/150">
					<div class="CellHover"></div>
				</div>
				<div class="MainWeddingPartyCell WeddingPartyCell" id="WeddingPartyCell6">
					<img src="http://placekitten.com/250/250">
					<div class="CellHover"></div>
				</div>
				<div class="WeddingPartyCell" id="WeddingPartyCell7">
					<img src="http://placekitten.com/150/150">
					<div class="CellHover"></div>
				</div>
				<div class="WeddingPartyCell" id="WeddingPartyCell8">
					<img src="http://placekitten.com/150/150">
					<div class="CellHover"></div>
				</div>
				<div class="WeddingPartyCell" id="WeddingPartyCell9">
					<img src="http://placekitten.com/150/150">
					<div class="CellHover"></div>
				</div>
				<div class="WeddingPartyCell" id="WeddingPartyCell10">
					<img src="http://placekitten.com/150/150">
					<div class="CellHover"></div>
				</div>
				<div class="WeddingPartyCell" id="WeddingPartyCell11">
					<img src="http://placekitten.com/150/150">
					<div class="CellHover"></div>
				</div>
				<div class="WeddingPartyContent" id="WeddingPartyContent">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</div>
			</div>
			
		</div>
		<div class="Strip Strip_04">
			<img class="BannerImage" src="Files/Images/theday.png" />
				
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
			<img class="BannerImage" src="Files/Images/wheretostay.png" />
		</div>
		<div class="Strip Strip_06">
			<img class="BannerImage" src="Files/Images/rsvp.png" />
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
			<img class="BannerImage" src="Files/Images/songrequests.png" />
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
