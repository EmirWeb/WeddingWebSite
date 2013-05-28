<?php
include_once ('../Widgets/Songs.php');
include_once ('../Widgets/User.php');
include_once ('../Widgets/Rsvp.php');
include_once ('../Utils/MySql.php');
include_once ('../Utils/SessionManager.php');
include_once ('Error.php');

$REPLY_CODE_JSON_KEY = "replyCode";

$LOGIN_RESPONSE_SONGS_KEY = "songs";
$LOGIN_RESPONSE_NAMES_KEY = "names";
$LOGIN_RESPONSE_ADDRESS_KEY = "address";

$LOGIN_RESPONSE_SONGS_VIEW_KEY = "songsView";
$LOGIN_RESPONSE_NAMES_VIEW_KEY = "namesView";

header('Content-type: application/json');

if (isset($_POST[$REPLY_CODE_JSON_KEY]))
	$replyCode =  $_POST[$REPLY_CODE_JSON_KEY];
else {
	http_response_code(412);
	die(Error::getJsonError(0));
}

$loginResult = array();
$loginRequests = array(
		User::getQuery($replyCode),
		Songs::getQueryForReplyCode($replyCode),
		Rsvp::getQuery($replyCode)
);

$loginQueryResults = MySql::rawQueries($loginRequests);
if (!$loginQueryResults){
	http_response_code(500);
	die(Error::getJsonError(3));
}

$userResult = $loginQueryResults[0];
$rsvpResult = $loginQueryResults[2];
if (empty($userResult)){
	http_response_code(401);
	die(Error::getJsonError(1));
}

$names = User::getUserData($userResult, $rsvpResult);
if (empty($names[User::$USER_USERS_JSON_KEY])){
	http_response_code(401);
	die(Error::getJsonError(1));
}

$loginResult[$LOGIN_RESPONSE_NAMES_KEY] = $names;
$loginResult[$LOGIN_RESPONSE_NAMES_VIEW_KEY] = User::getUsers($names);

$requestResult = $loginQueryResults[1];
$songs = Songs::getSongsData($requestResult);
if (!empty($songs)) {
	$loginResult[$LOGIN_RESPONSE_SONGS_KEY] = $songs;
	$loginResult[$LOGIN_RESPONSE_SONGS_VIEW_KEY] = Songs::getSongs($names, $songs, true);
}

SessionManager::setReplyCode($replyCode);
http_response_code(200);
echo(json_encode($loginResult));
?>