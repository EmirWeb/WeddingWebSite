<?php
class Address {
	public static $ADDRESS_TABLE_NAME = "address";
	public static $ADDRESS_TABLE_CODE_COLUMN_NAME = "code";
	public static $ADDRESS_TABLE_ADDRESS_COLUMN_NAME = "address";

	public static function getQuery($replyCode) {
		return "SELECT * FROM " . self::$ADDRESS_TABLE_NAME . " where " . self::$ADDRESS_TABLE_CODE_COLUMN_NAME . "='$replyCode';";
	}
	
	public static function getAddressData($queryResult){
		if (empty($queryResult)){
			if (!SessionManager::isLoggedIn())
				return null;
			$queryResult = MySql::rawQuery(self::getQuery(SessionManager::getReplyCode()));
			if (empty($queryResult))
				return null;
		}
	
		if($addressData = $queryResult->fetch_assoc())
			return $addressData[self::$ADDRESS_TABLE_ADDRESS_COLUMN_NAME];
		
		return null;
	}
}
?>