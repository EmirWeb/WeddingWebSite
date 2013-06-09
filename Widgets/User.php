<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/WeddingWebSite/Utils/MySql.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/WeddingWebSite/Utils/SessionManager.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/WeddingWebSite/Widgets/Rsvp.php");

class User {
	public static $USER_TABLE_NAME = "user";
	public static $USER_TABLE_ID_COLUMN_NAME = "id";
	public static $USER_TABLE_CODE_COLUMN_NAME = "code";
	public static $USER_TABLE_NAME_COLUMN_NAME = "name";
	public static $USER_TABLE_IS_COMING_COLUMN_NAME = "isComing";
	public static $USER_TABLE_FOOD_RESTRICTIONS_COLUMN_NAME = "foodRestrictions";
	
	public static $USER_USERS_JSON_KEY = "users";
	public static $USER_RSVP_JSON_KEY = "rsvp";
	public static $USER_CODE_JSON_KEY = "code";
	public static $USER_NAME_JSON_KEY = "name";
	public static $USER_IS_COMING_JSON_KEY = "isComing";
	public static $USER_FOOD_RESTRICTIONS_JSON_KEY = "foodRestrictions";
	
	public static function getQuery($replyCode) {
		return "SELECT * FROM " . self::$USER_TABLE_NAME . " where " . self::$USER_TABLE_CODE_COLUMN_NAME . "='$replyCode';";
	}
	
	public static function getInsertQuery($id, $isComing, $foodRestrictions){
		
		if ($isComing == 'true')
			$isComingBoolean = "1";
		else if ($isComing == 'false' ) 
			$isComingBoolean = "0";
		else 
			$isComingBoolean = "NULL";
		
		if (empty($foodRestrictions))
			$foodRestrictionValue = "NULL";
		else
			$foodRestrictionValue = "'$foodRestrictions'";
		
		return "UPDATE " . self::$USER_TABLE_NAME . " SET " . self::$USER_TABLE_IS_COMING_COLUMN_NAME . "=$isComingBoolean, " 
				. self::$USER_FOOD_RESTRICTIONS_JSON_KEY . "=$foodRestrictionValue WHERE " . self::$USER_TABLE_ID_COLUMN_NAME . "=$id;";
				
	}
	
	public static function getUserData($userResult, $rsvpResult = null){
		if (empty($userResult) || empty($rsvpResult)){
			if (!SessionManager::isLoggedIn())
				return null;
			$replyCode = SessionManager::getReplyCode();
			
			$queries = array ();
			if (empty($userResult))
				$queries[] = self::getQuery($replyCode);
			if (empty($rsvpResult))
				$queries[] = Rsvp::getQuery($replyCode);
			
			$queryResults = MySql::rawQueries($queries);
			if (empty($queryResults))
				return null;
			
			if (empty($userResult))
				$userResult = $queryResults[0];
			
			if (empty($rsvpResult))
				$rsvpResult = $queryResults[1];
			
		}
		
		$users = array();
		while ($userData = $userResult->fetch_assoc()){
			$user = array();
			$user[self::$USER_NAME_JSON_KEY] = $userData[self::$USER_TABLE_NAME_COLUMN_NAME];
			$user[self::$USER_IS_COMING_JSON_KEY] = $userData[self::$USER_TABLE_IS_COMING_COLUMN_NAME] == 1;
			$user[self::$USER_FOOD_RESTRICTIONS_JSON_KEY] = $userData[self::$USER_TABLE_FOOD_RESTRICTIONS_COLUMN_NAME];
			$users[$userData[self::$USER_TABLE_ID_COLUMN_NAME]] = $user;
		}
		
		$rsvp = Rsvp::getRsvpData($rsvpResult);
		$response[self::$USER_RSVP_JSON_KEY] = $rsvp;
		$response[self::$USER_USERS_JSON_KEY] = $users;
		
		return $response;
	}
	
	public static function getUsers($userData, $includeJavascript = true) {
		if (empty($userData)){
			$userData = self::getUserData(null, null);
			if (empty($userData))
				return null;
		}
		$users = $userData[self::$USER_USERS_JSON_KEY];
		$rsvp = $userData[self::$USER_RSVP_JSON_KEY];
		$hasSubmitted = Rsvp::hasSubmitted($rsvp);
	
		
		
		$html  = "<div class='Users'>";
		if ($hasSubmitted)
			$html .= self::getRsvpDetailsHtml($userData);
		else
			$html .= self::getNoRsvpHtml();
		$html .= self::getRsvpFormHtml($userData, $hasSubmitted);
		$html .= "</div>";

		if ($includeJavascript){
			$javascript = DomManager::getScript('Scripts/Widgets/User.js');
			$html .= $javascript;
		}
			
		return $html;
	}
	
	public static function getNoRsvpHtml(){
		return "
			<div class='Begin RsvpButton Button Center RsvpSectionButton'>Click Here to RSVP</div>
			";
	}
	
	public static function getRsvpDetailsHtml($userData){
		$users = $userData[self::$USER_USERS_JSON_KEY];
		$rsvp = $userData[self::$USER_RSVP_JSON_KEY];
		$html = "
			<div class='RsvpDetails'>
			";
		foreach ($users as $id => $user){
			$html .= "
				<div class='User id_$id'>
					<span class='Username'>{$user[self::$USER_NAME_JSON_KEY]}</span>
			";
			
			if ($user[self::$USER_IS_COMING_JSON_KEY])
				$html .= "
					<span class='IsComing'>is coming</span><br><br>
					<span class='FoodRestrictions'><b>Food Restrictions:</b> {$user[self::$USER_FOOD_RESTRICTIONS_JSON_KEY]}</span>
					<br>
					<br>
				</div>
					";
			else
				$html .= "
					<span class='IsNotComing' >is <b>NOT</b> coming</span>
				</div>
			";
		}
		if (isset($rsvp[Rsvp::$RSVP_MESSAGE_JSON_KEY]))
			$html .= "
					<div class='MessageDetails'>
				<br><span class='MessageLabel'>Your message to the bride and groom:</span><br>
				<br><span class='Message'>{$rsvp[Rsvp::$RSVP_MESSAGE_JSON_KEY]}</span></div>";
				
		$html .= "
				<div class='Edit RsvpButton Button Center'>CHANGE RSVP DETAILS</div>
			</div>
			";
			return $html;
		}
	
	
	public static function getRsvpFormHtml($userData, $hasSubmutted){
		$users = $userData[self::$USER_USERS_JSON_KEY];
		$rsvp = $userData[self::$USER_RSVP_JSON_KEY];
		$html = "
			<form class='RsvpForm Hidden'>
			";
		foreach ($users as $id => $user){
			$isComingChecked = "";
			$isNotComingChecked = "";
			$isComingHidden = "Hidden";
			$isNotComingHidden = "Hidden";
			
			if ($hasSubmutted){
				if ($user[self::$USER_IS_COMING_JSON_KEY]){
					$isComingChecked = "checked";
					$isComingHidden = "";
				} else {
					$isNotComingChecked = "checked";
					$isNotComingHidden = "";
				}
			}
			
			
			$name = MySql::unescapeString($user[self::$USER_NAME_JSON_KEY]);
			$foodRestrictions = MySql::unescapeString($user[self::$USER_FOOD_RESTRICTIONS_JSON_KEY]);
			$message =MySql::unescapeString($rsvp[Rsvp::$RSVP_MESSAGE_JSON_KEY]);
					
			$html .= "
				<div class='UserForm' id='$id'>
					<span class='UsernameLabel'>$name</span>
					<input class='IsComingInput' type='radio' value='true' name='group$id' $isComingChecked><b>Yes</b>, I will attend 
					<input class='IsNotComingInput' type='radio' value='false' name='group$id' $isNotComingChecked><b>No</b>, I will not attend
					<div class='IsComingDetails $isComingHidden'>
						<span 'IsComingLabel'>Yay! Let us know about any food restrictions you have.</span><br>
						<textarea class='FoodRestrictionsInput' name='FoodRestrictions' rows='2' cols='30'>$foodRestrictions</textarea>
					</div>
					<div class='IsNotComingDetails $isNotComingHidden'>
						<span class='IsNotComingLabel Label'>We will miss you!</span>
					</div>
				</div>
			";
		}
		$html .= "
				<span class='foodRestictions'>A message to the bride and groom!</span><br>
				<textarea class='MessageInput' rows='5' cols='50'>$message</textarea><br>
				<input class='Button Center' type='submit' value='SUBMIT'>
			</form>
			";
		return $html;
	}
	
}
