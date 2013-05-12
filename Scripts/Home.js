var PICTURE_DIRECTORY = "Files/Images/";
var HIDDEN_CLASS = 'Hidden';

/**
 * nextBannerFrame.addClass('Hidden').animate({opacity : 1.0}, animationTimeOut);
 * currentBannerFrame.animate({opacity : 0}, animationTimeOut).removeClass('Hidden');
 */

var currentSlideId = 0;
var slideCount = 7;

var getSlideId = function(id){
	return "#Slide" + id;
};

var getSlide = function(id){
	return $(getSlideId(id));
};

var showSlide = function(id){
	showElement(getSlide(currentSlideId));
};

var hideSlide = function(id){
	hideElement(getSlide(currentSlideId));
};

var showElement = function(element){
	element.removeClass(HIDDEN_CLASS);
};

var hideElement = function(element){
	element.addClass(HIDDEN_CLASS);
};



var next = function() {
	hideSlide(currentSlideId);
	
	currentSlideId++;
	if (currentSlideId >= slideCount)
		currentSlideId = 0;
	
	showSlide(currentSlideId);
};

var previous = function() {
	hideSlide(currentSlideId);
	
	currentSlideId--;
	if (currentSlideId < 0)
		currentSlideId = slideCount -1;
	
	showSlide(currentSlideId);
};

$(document).ready(function() {
	
	$('#Next').click(next);
	$('#Previous').click(previous);

});
