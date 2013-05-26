function Slider(nextButtonCssIdentifier, previousButtonCssIdentifier, slideCssIdentifier) {
	var HIDDEN_CLASS = 'Hidden';
	var currentSlideId = 0;
	var slideCount = 26;
	var nextButton = $(nextButtonCssIdentifier);
	var previousButton = $(previousButtonCssIdentifier);
	var slideCssIdentifier = slideCssIdentifier;
	var me = this;

	var getSlideId = function(id) {
		return slideCssIdentifier + id;
	};

	var getSlide = function(id) {
		return $(getSlideId(id));
	};
	
	var showSlide = function(id) {
		showElement(getSlide(currentSlideId));
	};

	var hideSlide = function(id) {
		hideElement(getSlide(currentSlideId));
	};

	var showElement = function(element) {
		element.removeClass(HIDDEN_CLASS);
	};

	var hideElement = function(element) {
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
			currentSlideId = slideCount - 1;

		showSlide(currentSlideId);
	};

	(function() {
		nextButton.click(next);
		previousButton.click(previous);
	})();
}
