<?php
session_start();
class SessionManager {
	private static $REPLY_CODE = 'replyCode';

	public function clearSession() {
		if (isset($_SESSION[self::$REPLY_CODE]))
			unset($_SESSION[self::$REPLY_CODE]);
		session_destroy();
	}
	
	public function setReplyCode($replyCode) {
		$_SESSION[self::$REPLY_CODE] = $replyCode;
	}
	
	public function isLoggedIn(){
		return isset($_SESSION[self::$REPLY_CODE]);
	}
	
	public function getReplyCode(){
		if (isset($_SESSION[self::$REPLY_CODE]))
			return $_SESSION[self::$REPLY_CODE];
		return null;
	}
}

?>