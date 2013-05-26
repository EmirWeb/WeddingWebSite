<?php
include_once ('../Utils/MySql.php');
include_once ('../Utils/SessionManager.php');
include_once ('../Widgets/Songs.php');
include_once ('../Widgets/User.php');
include_once ('Error.php');

$RSVPS_JSON_KEY = "rsvps";
$MESSAGE_JSON_KEY = "message";
$IS_COMING_JSON_KEY = "isComing";
$FOOD_RESTRICTIONS_JSON_KEY = "foodRestrictions";

$RESPONSE_RSVP_HTML_KEY = "rsvpHtml";

header('Content-type: application/json');


if (!SessionManager::isLoggedIn()) {
	http_response_code(412);
	die(Error::getJsonError(4));
}

if (isset($_POST[$RSVPS_JSON_KEY]) && isset($_POST[$MESSAGE_JSON_KEY])) {	
	$rsvps =  $_POST[$RSVPS_JSON_KEY];	
	$message =  $_POST[$MESSAGE_JSON_KEY];
	$replyCode = SessionManager::getReplyCode();
} else {
	http_response_code(412);
	die(Error::getJsonError(0));
}

$userData = User::getUserData(null, null);
if (count($userData[User::$USER_USERS_JSON_KEY]) != count($rsvps)){
	http_response_code(400);
	die(Error::getJsonError(5));
}

$queires = array();
foreach ($rsvps as $id => $rsvp){
	$isComing = $rsvp[$IS_COMING_JSON_KEY];
	$foodRestrictions = $rsvp[$FOOD_RESTRICTIONS_JSON_KEY];
	$userQuery = User::getInsertQuery($id, $isComing, $foodRestrictions);
	$queries[] = $userQuery;
}

$rsvpQuery = Rsvp::getInsertQuery($replyCode, true, $message);
$queries[] = $rsvpQuery;

$id = MySql::insertQueries($queries);

$result = array();
$result[$RESPONSE_RSVP_HTML_KEY] = User::getUsers(null);

http_response_code(200);
echo(json_encode($result));
?>