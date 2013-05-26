var rsvpUrl = "NetworkCalls/Rsvp.php";

var rsvpSuccess = function(response, textStatus) {
	$('h3.ReplyCodeForm').remove();
	$('div.Strip_06').append(response.namesView);
	$('div.Strip_07').append(response.songsView);
};

var rsvpFailure = function(jqXHR, textStatus, errorThrown) {
	var error = $.parseJSON(jqXHR.responseText);
	console.log(error);
	alert(error.error.message);
};

$(document).ready(function() {
	$('div.RsvpButton').click(function() {
		$('form.RsvpForm').removeClass('Hidden');
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
		var rsvps = new Array();
		console.log("hi");
		$.each($('div.UserForm'), function(id) {
			var id = $(this).attr("id");
			console.log(id);
			var isComing = $("#" + id + " input:radio:checked").val("0");
			if (isComing == null) {
				alert("Please rsvp for " + $("#" + id + " span.UsernameLabel").val());
				return false;
			}
			var foodRestictions = $("#" + id + " textarea.FoodRestrictionsInput").val();
			var rsvp = {
				'isComing' : isComing == 'true',
				'foodRestictions' : foodRestictions
			};
			rsvps["" + id] = rsvp;
		});

		console.log("there");
		var request = {
			'rsvps' : rsvps,
			'message' : $("form.RsvpForm textarea.MessageInput").val()
		};

		$.ajax({
			type : "POST",
			data : request,
			url : rsvpUrl,
			success : success,
			error : failure
		});
		return false;
	});

});