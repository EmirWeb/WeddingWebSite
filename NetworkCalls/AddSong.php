<?php
include_once ('../Utils/MySql.php');
include_once ('../Utils/SessionManager.php');
include_once ('../Widgets/Songs.php');
include_once ('Error.php');

$ARTIST_JSON_KEY = "artist";
$HIGHLIGHT_JSON_KEY = "hasHighlight";
$SONG_JSON_KEY = "song";
$USER_ID_JSON_KEY = "userId";

$RESPONSE_SONG_HTML_KEY = "songHtml";

header('Content-type: application/json');

if (!SessionManager::isLoggedIn()) {
	http_response_code(412);
	die(Error::getJsonError(4));
}




if (isset($_POST[$ARTIST_JSON_KEY]) && isset($_POST[$SONG_JSON_KEY]) && isset($_POST[$USER_ID_JSON_KEY]) && isset($_POST[$HIGHLIGHT_JSON_KEY])) {
	$artist =  MySql::escapeString($_POST[$ARTIST_JSON_KEY]);
	$song =  MySql::escapeString($_POST[$SONG_JSON_KEY]);
	$userId = MySql::escapeString($_POST[$USER_ID_JSON_KEY]);
	$replyCode = SessionManager::getReplyCode();
	$hasHighlight = $_POST[$HIGHLIGHT_JSON_KEY] == 'true';
} else {
	http_response_code(400);
	die(Error::getJsonError(0));
}

if (empty($artist) && empty($song)){
	http_response_code(400);
	die(Error::getJsonError(6));
}


$query = Songs::getInsertQuery($userId, $replyCode, $artist, $song);
$id = MySql::insert($query);

$result = array();
$result[$RESPONSE_SONG_HTML_KEY] = Songs::getSong($id, $userId, $artist, $song, false, $hasHighlight);

http_response_code(200);
echo(json_encode($result));
?>