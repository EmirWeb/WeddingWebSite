<?php
class Rsvp {
	public static $RSVP_TABLE_NAME = "rsvp";
	public static $RSVP_TABLE_CODE_COLUMN_NAME = "code";
	public static $RSVP_TABLE_SUBMITTED_COLUMN_NAME = "submitted";
	public static $RSVP_TABLE_MESSAGE_COLUMN_NAME = "message";

	public static $RSVP_RSVPS_JSON_KEY = "rsvps";
	public static $RSVP_SUBMITTED_JSON_KEY = "submitted";
	public static $RSVP_MESSAGE_JSON_KEY = "message";

	public static function getQuery($replyCode) {
		return "SELECT * FROM " . self::$RSVP_TABLE_NAME . " where " . self::$RSVP_TABLE_CODE_COLUMN_NAME . "='$replyCode';";
	}

	public static function getInsertQuery($replyCode, $submitted, $message){
		if (!isset($message) || empty($message))
			$messageInput = "NULL";
		else
			$messageInput = "'$message'";
		
		if ($submitted)
			$sumittedValue = 1;
		else
			$sumittedValue = 0;
		
		return 
			" INSERT INTO " . self::$RSVP_TABLE_NAME . " (" . self::$RSVP_TABLE_CODE_COLUMN_NAME . ", " . self::$RSVP_TABLE_SUBMITTED_COLUMN_NAME . ", " . self::$RSVP_TABLE_MESSAGE_COLUMN_NAME . ") VALUES ( '$replyCode', '$submitted', $messageInput)" .
			" ON DUPLICATE KEY UPDATE " . self::$RSVP_TABLE_SUBMITTED_COLUMN_NAME . "='$sumittedValue', " . self::$RSVP_TABLE_MESSAGE_COLUMN_NAME . "=$messageInput;" 
			;
	}

	public static function getRsvpData($queryResult){
		if (empty($queryResult)){
			if (!SessionManager::isLoggedIn())
				return null;
			$replyCode = SessionManager::getReplyCode();
			$query = self::getQuery($replyCode);
			$queryResult = MySql::rawQuery($query);
			if (empty($queryResult))
				return null;
		}
		
		if($rsvpData = $queryResult->fetch_assoc()){
			$rsvp = array();
			$rsvp[self::$RSVP_SUBMITTED_JSON_KEY] = $rsvpData[self::$RSVP_TABLE_SUBMITTED_COLUMN_NAME] == 1;
			$rsvp[self::$RSVP_MESSAGE_JSON_KEY]= $rsvpData[self::$RSVP_TABLE_MESSAGE_COLUMN_NAME];
			return $rsvp;
		}

		return null;
	}

	public static function hasSubmitted($rsvp){
		if (!isset($rsvp))
			$rsvp = self::getRsvpData(null);
		return isset($rsvp) && isset($rsvp[self::$RSVP_SUBMITTED_JSON_KEY]) && $rsvp[self::$RSVP_SUBMITTED_JSON_KEY];
	}
}
?>