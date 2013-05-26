$(document).ready(function() {
	$('div.WeddingParty div.WeddingPartyCell').click(function() {
		var cellElement = $(this);
		var idString = cellElement.attr("id");
		var id = idString.replace("WeddingPartyCell","");
		$('div.WeddingParty span.Biography').addClass("Hidden");
		$('#Biography' + id).removeClass("Hidden");
	});
});