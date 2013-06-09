<?php

class Error {

	private static $ERROR_OBJECT_KEY = "error";
	private static $ERROR_CODE_KEY = "code";
	private static $ERROR_MESSAGE_KEY = "message";
	
	private static $ERRORS = array(
		0 => "Did not include a registration code.",
		1 => "Could not find a matching registration code. Please try again. If you need further assistance, please contact Laura or Emir.",
		2 => "Duplicate code, please contact Emir or Laura.",
		3 => "Could not reach Database, please contact Emir or Laura.",
		4 => "User is not logged in.",
		5 => "Please fill in all fields for guests.",
		6 => "Please do not leave the entries blank."
	);

	public function getJsonError($errorCode){
		$error = array (
			self::$ERROR_OBJECT_KEY => array (
				self::$ERROR_CODE_KEY => $errorCode,
				self::$ERROR_MESSAGE_KEY => self::$ERRORS[$errorCode]
			)
		);
		return json_encode($error);
	}
}

?>