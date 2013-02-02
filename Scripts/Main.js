$(document).ready(function() {

	$(function() {
		$(window).scroll(sticky_relocate);
		sticky_relocate();
	});

	function sticky_relocate() {
		var banner = $('div.Container img.Banner');
		var windowTop = $(window).scrollTop();
		var divBottom = banner.offset().top + banner.height();
		console.log("divBottom: " + divBottom);
		if (windowTop >= divBottom)
			$('div.Container div.Menu').addClass('stick')
		else
			$('div.Container div.Menu').removeClass('stick');
	}
});