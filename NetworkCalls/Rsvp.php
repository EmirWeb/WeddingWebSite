<?php
include_once ('../Utils/MySql.php');
include_once ('../Utils/SessionManager.php');
include_once ('../Widgets/Songs.php');
include_once ('Error.php');

$RSVPS_JSON_KEY = "rsvps";
$MESSAGE_JSON_KEY = "message";
$IS_COMING_JSON_KEY = "isComing";
$FOOD_RESTRICTIONS_JSON_KEY = "foodRestrictions";

$RESPONSE_SONG_HTML_KEY = "songHtml";

header('Content-type: application/json');

var_dump($_POST);

if (!SessionManager::isLoggedIn()) {
	http_response_code(412);
	die(Error::getJsonError(4));
}

if (isset($_POST[$ARTIST_JSON_KEY]) && isset($_POST[$SONG_JSON_KEY]) && isset($_POST[$ID_JSON_KEY])) {
	$artist =  mysql_real_escape_string($_POST[$ARTIST_JSON_KEY]);
	$song =  mysql_real_escape_string($_POST[$SONG_JSON_KEY]);
	$id =  mysql_real_escape_string($_POST[$ID_JSON_KEY]);
	$replyCode = SessionManager::getReplyCode();
} else {
	http_response_code(412);
	die(Error::getJsonError(0));
}


$query = Songs::getInsertQuery($id, $replyCode, $artist, $song);
$id = MySql::insert($query);

$result = array();
$result[$RESPONSE_SONG_HTML_KEY] = Songs::getSong($id, $artist, $song, false);

http_response_code(200);
echo(json_encode($result));
?>