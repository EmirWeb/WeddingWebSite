<?php
include_once ('../Utils/MySql.php');
include_once ('../Utils/SessionManager.php');
include_once ('../Widgets/Songs.php');
include_once ('Error.php');

$SONG_ID_JSON_KEY = "songId";

header('Content-type: application/json');

if (!SessionManager::isLoggedIn()) {
	http_response_code(412);
	die(Error::getJsonError(4));
}


if (isset($_POST[$SONG_ID_JSON_KEY]) ) {
	$id =  MySql::escapeString($_POST[$SONG_ID_JSON_KEY]);
} else {
	http_response_code(412);
	die(Error::getJsonError(0));
}


$query = Songs::getDeleteQuery($id);
MySql::rawQuery($query);

http_response_code(200);
?>