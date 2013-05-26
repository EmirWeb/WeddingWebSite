var addSongUrl = "NetworkCalls/AddSong.php";

var setUserSongs = function(id) {
	$("div.Song").addClass("Hidden");
	$("div.Id" + id).removeClass("Hidden");
};

var getSelectedId = function() {
	return $("#UserSelector").val();
};

var addSongFailure = function(jqXHR, textStatus, errorThrown) {
	var error = $.parseJSON(jqXHR.responseText);
	console.log(error);
	alert(error.error.message);
};

var addSongSuccess = function(response, textStatus) {
	$('div.Songs').append(response.songHtml);
};

$(document).ready(function() {
	$('#AddSong').submit(function() {
		$.ajax({
			type : "POST",
			data : {
				id : getSelectedId(),
				artist : $('#Artist').val(),
				song : $('#Song').val()
			},
			url : addSongUrl,
			success : addSongSuccess,
			error : addSongFailure
		});
		return false;
	});

	$("#UserSelector").change(function() {
		var id = getSelectedId();
		setUserSongs(id);
	});

});