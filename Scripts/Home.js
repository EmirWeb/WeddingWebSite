var replyCodeUrl = "NetworkCalls/ReplyCode.php";

var success = function(response, textStatus) {
	$('h3.ReplyCodeForm').remove();
	$('div.Strip_06').append(response.namesView);
	$('div.Strip_07').append(response.songsView);
};

var failure = function(jqXHR, textStatus, errorThrown) {
	var error = $.parseJSON(jqXHR.responseText);
	console.log(error);
	alert(error.error.message);
};

$(document).ready(function() {
	var slider = new Slider('#Next', '#Previous', '#Slide');
	$('#ReplyCodeRSVP').submit(function() {
		$.ajax({
			type : "POST",
			data : {
				replyCode : $('#ReplyCodeRSVP input').val()
			},
			url : replyCodeUrl,
			success : success,
			error : failure
		});
		return false;
	});

	$('#ReplyCodeSongs').submit(function() {
		$.ajax({
			type : "POST",
			data : {
				replyCode : $('#ReplyCodeSongs input').val()
			},
			url : replyCodeUrl,
			success : success,
			error : failure
		});
		return false;
	});
	
});
