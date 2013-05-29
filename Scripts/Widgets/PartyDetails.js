$(document).ready(function() {
	$('div.PartyDetails div.Directions').click(function(e) {
		$('#DirectionsModal').modal();
	});
	$('div.PartyDetails div.EventInfo').click(function(e) {
		$('#EventInfoModal').modal();
	});
});