<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/WeddingWebSite/Utils/MySql.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/WeddingWebSite/Utils/SessionManager.php");

class User {
	public static $USER_TABLE_NAME = "user";
	public static $USER_TABLE_ID_COLUMN_NAME = "id";
	public static $USER_TABLE_CODE_COLUMN_NAME = "code";
	public static $USER_TABLE_NAME_COLUMN_NAME = "name";
	
	public static function getQuery($replyCode) {
		return "SELECT * FROM " . self::$USER_TABLE_NAME . " where " . self::$USER_TABLE_CODE_COLUMN_NAME . "='$replyCode';";
	}
	
	public static function getUserData($queryResult){
		if (empty($queryResult)){
			if (!SessionManager::isLoggedIn())
				return null;
			$queryResult = MySql::rawQuery(self::getQuery(SessionManager::getReplyCode()));
			if (empty($queryResult))
				return null;
		}
		$users = array();
		while ($userData = $queryResult->fetch_assoc()){
			$name = $userData[self::$USER_TABLE_NAME_COLUMN_NAME];
			$users[$userData[self::$USER_TABLE_ID_COLUMN_NAME]] = $name;
		}
		return $users;
	}
	
	public static function getUsers($users) {
		if (empty($users)){
			$users = self::getUserData(null);
			if (empty($users))
				return null;
		}
	
		$html  = "<div class='Users'>";
		foreach ($users as $user)
			$html .= "<div class='User'>$user</div>";
		$html .= "</div>";
		
		return $html;
	}
}