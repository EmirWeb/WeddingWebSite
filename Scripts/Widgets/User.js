var rsvpUrl = "NetworkCalls/Rsvp.php";

var rsvpSuccess = function(response, textStatus) {
	var userElement = $('div.Users');
	userElement.replaceWith(response.rsvpHtml);
};

var rsvpFailure = function(jqXHR, textStatus, errorThrown) {
	var error = $.parseJSON(jqXHR.responseText);
	console.log(error);
	alert(error.error.message);
};

$(document).ready(function() {
	$('div.RsvpButton').click(function() {
		$('form.RsvpForm').removeClass('Hidden');
		var detailsElement = $('div.RsvpDetails');
		if (detailsElement != 'undefined')
			detailsElement.remove();
		this.remove();
	});

	$.each($('div.UserForm'), function(id) {
		var id = $(this).attr("id");
		$("#" + id + " input:radio").change(function() {
			var isComing = $(this).val();
			if (isComing == null)
				return;

			var isComingDiv = $("#" + id + " div.IsComingDetails");
			var isNotComingDiv = $("#" + id + " div.IsNotComingDetails");
			if (isComing == 'true') {
				isComingDiv.removeClass("Hidden");
				isNotComingDiv.addClass("Hidden");
			} else {
				isComingDiv.addClass("Hidden");
				isNotComingDiv.removeClass("Hidden");
			}
		})
	});

	$('form.RsvpForm').submit(function() {
		var rsvps = {};
		$.each($('div.UserForm'), function(id) {
			var id = $(this).attr("id");
			var isComing = $("#" + id + " input:radio:checked").val();
			if (isComing == null) {
				alert("Please rsvp for " + $("#" + id + " span.UsernameLabel").val());
				return false;
			}
			var foodRestictions = $("#" + id + " textarea.FoodRestrictionsInput").val();
			var rsvp = {
				'isComing' : isComing,
				'foodRestrictions' : foodRestictions
			};
			rsvps[id] = rsvp;
		});

		var request = {
			'rsvps' : rsvps,
			'message' : $("form.RsvpForm textarea.MessageInput").val()
		};

		$.ajax({
			type : "POST",
			data : request,
			url : rsvpUrl,
			success : rsvpSuccess,
			error : failure
		});
		return false;
	});

});