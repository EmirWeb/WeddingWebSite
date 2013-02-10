var loremIpsum = new Array();

loremIpsum
		.push("Laura and Emir met in 2007 while working together at Alice Fazooli's.  Although they were just friends, Laura remembers the first time she saw Emir, weaving through the booths with his head cocked to the side and arms full of dishes. He was a hard worker with a lot of integrity.  Emir remembers noticing LauraÕs red lips and long hair. They worked side by side, on and off, for years without realizing they were meant to be together.");

loremIpsum
		.push("It was years later, in 2011, when they reconnected, thanks to the wonderful world of facebook...  Laura remembered that Emir loves heavy metal. Excited about spreading the good word about the amazing Mercy Now, she invited him to a show... as friends.  Emir didnÕt realize that until he arrived and noticed she also invited her siblings and a few other friends.  A week later he thought for sure it was a date when she invited him to see Hot Wax, until he saw Katie and Adam were there again... ");

loremIpsum
		.push("Even though Laura was oblivious to any of EmirÕs true intentions, this did not stop him from telling her ÒI think you are beautifulÓ.  Laura was very take back, initially worried this would hinder their renewly budding friendship.  Although Laura was not sure if she felt the same way, being a very opportunistic woman, she decided to have an open mind and spend some time with Emir to see where it went.  Needless to say, Emir was patiently persistent for more than a few dates while Laura took her time.");

loremIpsum.push(" more here ");

loremIpsum.push(" It wasnÕt until one night in particular... Emir took Laura to the Tim Burton Exhibit at TIFF and then to dinner at Hey Lucy.  Everything fell into place and they have been inseparable since.");

loremIpsum.push("The first time Emir met LauraÕs parents, Laura was in BC on a work trip.");

loremIpsum.push("final thing");

var pictureDirectory = "Files/Images/";
var animationTimeOut = 1000;
var currentBannerFrame;
var NULL = "undefined";

function animateToFrame(bannerFrame) {
	if (bannerFrame == NULL || currentBannerFrame == NULL || bannerFrame.get(0) == currentBannerFrame.get(0))
		return;

	bannerFrame.addClass('show').animate({
		opacity : 1.0
	}, animationTimeOut);
	currentBannerFrame.animate({
		opacity : 0
	}, animationTimeOut).removeClass('show');
	currentBannerFrame = bannerFrame;
};

function sticky_relocate() {
	var banner = $('div.Container img.Banner');
	var windowTop = $(window).scrollTop();
	var divBottom = banner.offset().top + banner.height();
	if (windowTop >= divBottom)
		$('div.Container div.Scroller').show().addClass('stick')
	else
		$('div.Container div.Scroller').hide().removeClass('stick');
};

function getFrame(index) {
	return $('#BannerAnimator' + index);
};

$(document).ready(function() {

	var frameCount = 7;
	var frameIndex = 0;

	currentBannerFrame = getFrame(frameIndex++);
	while (frameIndex < frameCount) {
		var bannerFrame = getFrame(frameIndex);
		bannerFrame.animate({
			opacity : 0
		}, 0).removeClass('show');
		bannerFrame.attr('src', pictureDirectory + 'BannerAnimationFrame' + frameIndex + '.JPG')
		frameIndex++;
	}

	$('a.TimeLineHighlight').hover(function() {
		var id = $(this).attr('id');
		var index = id.substr(id.length - 1, 1)
		animateToFrame(getFrame(index));
		$('div.TimeLineContent').html(loremIpsum[index]);
	}, function() {
	});

	$(window).scroll(sticky_relocate);
});