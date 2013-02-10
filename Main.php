<?php
	include_once('Utils/DomManager.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Main.css');
	DomManager::addScript('Scripts/Utils/jquery-1.8.3.min.js');
	DomManager::addScript('Scripts/Utils/Async.js');
	DomManager::addScript('Scripts/Main.js');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Emir & Laura</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>		

	</head>
	<body>
		<div class="Container">
			<div class="BannerWrapper">
				<img class="Banner" src="Files/Images/Banner.png" width="990px"></img>
			</div>
			<div class="Menu">
				<a href="#">Us</a>&nbsp;&nbsp;
				<a href="#">Our Wedding Party</a>&nbsp;&nbsp;
				<a href="#">The Party</a>&nbsp;&nbsp;
				<a href="#">Where To Stay</a>&nbsp;&nbsp;
				<a href="#">RSVP</a>&nbsp;&nbsp;
				<a href="#">Song Request</a>&nbsp;&nbsp;
			</div>
			<div class="Menu Scroller">
				<a href="#">Us</a>&nbsp;&nbsp;
				<a href="#">Our Wedding Party</a>&nbsp;&nbsp;
				<a href="#">The Party</a>&nbsp;&nbsp;
				<a href="#">Where To Stay</a>&nbsp;&nbsp;
				<a href="#">RSVP</a>&nbsp;&nbsp;
				<a href="#">Song Request</a>&nbsp;&nbsp;
			</div>
			<?php $BANNER_WIDTH = 990; ?>
			<div class="Crop">
				<img class="BannerFrame" id="BannerAnimator0" src="Files/Images/BannerAnimationFrame0.jpg" width="<?php echo $BANNER_WIDTH; ?>">
				<img class="BannerFrame" id="BannerAnimator1" width="<?php echo $BANNER_WIDTH; ?>px">
				<img class="BannerFrame" id="BannerAnimator2" width="<?php echo $BANNER_WIDTH; ?>px" >
				<img class="BannerFrame" id="BannerAnimator3" width="<?php echo $BANNER_WIDTH; ?>px">
				<img class="BannerFrame" id="BannerAnimator4" width="<?php echo $BANNER_WIDTH; ?>px">
				<img class="BannerFrame" id="BannerAnimator5" width="<?php echo $BANNER_WIDTH; ?>px">
				<img class="BannerFrame" id="BannerAnimator6" width="<?php echo $BANNER_WIDTH; ?>px">
				<div class="TimeLine">
					----
					<a id="TimeLineHighLight0" class="TimeLineHighlight">*</a>
					----
					<a id="TimeLineHighLight1" class="TimeLineHighlight">*</a>
					----
					<a id="TimeLineHighLight2" class="TimeLineHighlight">*</a>
					----
					<a id="TimeLineHighLight3" class="TimeLineHighlight">*</a>
					----
					<a id="TimeLineHighLight4" class="TimeLineHighlight">*</a>
					----
					<a id="TimeLineHighLight5" class="TimeLineHighlight">*</a>
					----
					<a id="TimeLineHighLight6" class="TimeLineHighlight">*</a>
					----
				</div>
				
				<div class="Clear"></div>
			</div>
			<div class="TimeLineContent">
			</div>
			
			<div class="WeddingPartyRow">
				<div class="WeddingPartyCell Left">
					<div class="CellHover"></div>
					<img src="http://placekitten.com/247/247">
				</div>
				<div class="WeddingPartyCell CenterLeft">
					<div class="CellHover"></div>
					<img src="http://placekitten.com/248/247">
				</div>
				<div class="WeddingPartyCell CenterRight">
					<div class="CellHover"></div>
					<img src="http://placekitten.com/248/247">
				</div>
				<div class="WeddingPartyCell Right">
					<div class="CellHover"></div>
					<img src="http://placekitten.com/247/247">
				</div>
				<div class="Clear"></div>
			</div>
			<div class="WeddingPartyCenterRow">
				<div class="WeddingPartyColumn">
					<div class="WeddingPartyCell Left">
						<div class="CellHover"></div>
						<img src="http://placekitten.com/247/247">
					</div>
					<div class="WeddingPartyCell Left">
						<div class="CellHover"></div>
						<img src="http://placekitten.com/247/247">
					</div>
				</div>
				
				<div class="WeddingPartyFeature">
					<img src="http://placekitten.com/496/494">
				</div>
				
				<div class="WeddingPartyColumn">
					<div class="WeddingPartyCell Right">
						<div class="CellHover"></div>
						<img src="http://placekitten.com/247/247">
					</div>
					<div class="WeddingPartyCell Right">
						<div class="CellHover"></div>
						<img src="http://placekitten.com/247/247">
					</div>
				</div>
				<div class="Clear"></div>
			</div>
			
			
			<div class="WeddingPartyRow">
				<div class="WeddingPartyCell Left">
					<div class="CellHover"></div>
					<img src="http://placekitten.com/247/247">
				</div>
				<div class="WeddingPartyCell CenterLeft">
					<div class="CellHover"></div>
					<img src="http://placekitten.com/248/247">
				</div>
				<div class="WeddingPartyCell CenterRight">
					<div class="CellHover"></div>
					<img src="http://placekitten.com/248/247">
				</div>
				<div class="WeddingPartyCell Right">
					<div class="CellHover"></div>
					<img src="http://placekitten.com/247/247">
				</div>
				<div class="Clear"></div>
			</div>
			
			<div class="Clear"></div>
		</div>
	</body>
	<?php echo DomManager::getScripts(); ?>
</html>
