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
	
	public static function getUserData($queryResult){
		if (empty($queryResult)){
			if (!SessionManager::isLoggedIn())
				return null;
			$replyCode = SessionManager::getReplyCode();
			$queries = array ();
			$queries[] = self::getQuery($replyCode);
			$queries[] = Rsvp::getQuery($replyCode);
			
			$queryResults = MySql::rawQueries($queries);
			var_dump($replyCode);
			if (empty($queryResults) || empty($queryResults[0]))
				return null;
		}
		$users = array();
		while ($userData = $queryResults[0]->fetch_assoc()){
			$user = array();
			$user[self::$USER_NAME_JSON_KEY] = $userData[self::$USER_TABLE_NAME_COLUMN_NAME];
			$user[self::$USER_IS_COMING_JSON_KEY] = $userData[self::$USER_TABLE_IS_COMING_COLUMN_NAME] == 1;
			$user[self::$USER_FOOD_RESTRICTIONS_JSON_KEY] = $userData[self::$USER_TABLE_FOOD_RESTRICTIONS_COLUMN_NAME];
			$users[$userData[self::$USER_TABLE_ID_COLUMN_NAME]] = $user;
		}
		
		$rsvp = Rsvp::getRsvpData($queryResults[1]);
		$response[self::$USER_RSVP_JSON_KEY] = $rsvp;
		$response[self::$USER_USERS_JSON_KEY] = $users;
		
		return $response;
	}
	
	public static function getUsers($userData) {
		if (empty($userData)){
			$userData = self::getUserData(null);
			if (empty($userData))
				return null;
		}
		$users = $userData[self::$USER_USERS_JSON_KEY];
		
		$rsvp = $userData[self::$USER_RSVP_JSON_KEY];
		$hasSubmitted = Rsvp::hasSubmitted($rsvp);
	
		$html  = "<div class='Users'>";
		if ($hasSubmitted)
			$html .= self::getRsvpDetailsHtml($users);
		else
			$html .= self::getNoRsvpHtml();
		$html .= self::getRsvpFormHtml($users, $hasSubmitted);
		$html .= "</div>";
		
		return $html;
	}
	
	public static function getNoRsvpHtml(){
		return "
			<div class='Begin RsvpButton Button Center'>Click Here to RSVP</div>
			";
	}
	
	public static function getRsvpDetailsHtml($users){
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
					<span class='IsComing'>is coming</span>
					<span class='FoodRestrictions'>Food Restrictions: {$user[self::$USER_FOOD_RESTRICTIONS_JSON_KEY]}</span>
						";
			else
				$html .= "
					<span class='IsNotComing' >is not coming</span>
				</div>
			";
		}
		if (isset($user[self::$USER_FOOD_RESTRICTIONS_JSON_KEY]))
			$html .= "
				<br><span class='MessageLabel'>Your message to the bride and groom:</span><br>
				<br><span class='Message'>{$user[self::$USER_FOOD_RESTRICTIONS_JSON_KEY]}</span>";
		$html .= "
				<div class='Edit RsvpButton Button Center'>Click here to change RSVP details</div>
			</div>
			";
			return $html;
		}
	
	
	public static function getRsvpFormHtml($users, $hasSubmutted){
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
					
			$html .= "
				<div class='UserForm' id='$id'>
					<span class='UsernameLabel' >{$user[self::$USER_NAME_JSON_KEY]}</span>
					<input class='IsComingInput' type='radio' value='true' name='group$id' $isComingChecked>Yes, I will attend 
					<input class='IsNotComingInput' type='radio' value='false' name='group$id' $isNotComingChecked>No, I will not attend
					<div class='IsComingDetails $isComingHidden'>
						<span 'IsComingLabel'>Yay! Let us know about any food restrictions you have.</span><br>
						<textarea class='FoodRestrictionsInput' name='FoodRestrictions' rows='2' cols='30'></textarea>
					</div>
					<div class='IsNotComingDetails $isNotComingHidden'>
						<span class='IsNotComingLabel Label'>We will miss you!</span>
					</div>
				</div>
			";
		}
		$html .= "
				<span class='foodRestictions'>A message to the bride and groom!</span><br>
				<textarea class='MessageInput' rows='5' cols='50'></textarea><br>
				<input class='Button Center' type='submit'>
			</form>
			";
		return $html;
	}
	
}
