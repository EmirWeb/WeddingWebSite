<?php
class Rsvp {
	public static $RSVP_TABLE_NAME = "rsvp";
	public static $RSVP_TABLE_CODE_COLUMN_NAME = "code";
	public static $RSVP_TABLE_SUBMITTED_COLUMN_NAME = "submitted";
	public static $RSVP_TABLE_MESSAGE_COLUMN_NAME = "message";
	
	public static $RSVP_TABLE_SUBMITTED_JSON_KEY = "submitted";
	public static $RSVP_TABLE_MESSAGE_JSON_KEY = "message";

	public static function getQuery($replyCode) {
		return "SELECT * FROM " . self::$RSVP_TABLE_NAME . " where " . self::$RSVP_TABLE_CODE_COLUMN_NAME . "='$replyCode';";
	}
	
	public static function getRsvpData($queryResult){
		if (empty($queryResult)){
			if (!SessionManager::isLoggedIn())
				return null;
			$queryResult = MySql::rawQuery(self::getQuery(SessionManager::getReplyCode()));
			if (empty($queryResult))
				return null;
		}
	
		if($rsvpData = $queryResult->fetch_assoc()){
			$rsvp = array();
			$rsvp[self::$RSVP_TABLE_SUBMITTED_JSON_KEY] = $rsvpData[self::$RSVP_TABLE_SUBMITTED_COLUMN_NAME] == 0;
			$rsvp[self::$RSVP_TABLE_MESSAGE_JSON_KEY]= $rsvpData[self::$RSVP_TABLE_MESSAGE_COLUMN_NAME];
			return $rsvp;
		}
		
		return null;
	}
	
	public static function hasSubmitted($rsvp){
		if (!isset($rsvp))
			$rsvp = self::getRsvpData(null);
		return isset($rsvp) && isset($rsvp[self::$RSVP_TABLE_SUBMITTED_JSON_KEY]) && $rsvp[self::$RSVP_TABLE_SUBMITTED_JSON_KEY];
	}
}
?>