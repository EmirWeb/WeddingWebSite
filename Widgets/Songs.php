<?php
include_once ( $_SERVER['DOCUMENT_ROOT'] . '/WeddingWebSite/Utils/DomManager.php');
include_once ( $_SERVER['DOCUMENT_ROOT'] . '/WeddingWebSite/Widgets/User.php');

class Songs {

	public static $REQUEST_TABLE_NAME = "request";
	public static $REQUEST_TABLE_ID_COLUMN_NAME = "id";
	public static $REQUEST_TABLE_CODE_COLUMN_NAME = "code";
	public static $REQUEST_TABLE_SONG_COLUMN_NAME = "song";
	public static $REQUEST_TABLE_ARTIST_COLUMN_NAME = "artist";

	public static $RESPONSE_SONG_JSON_KEY = "song";
	public static $RESPONSE_ID_JSON_KEY = "id";
	public static $RESPONSE_ARTIST_JSON_KEY = "artist";

	public static function getQueryForId($id) {
		return "SELECT * FROM  " . self::$REQUEST_TABLE_NAME . " NATURAL JOIN  " . User::$USER_TABLE_NAME . " where " . self::$REQUEST_TABLE_ID_COLUMN_NAME . "='$id';";
	}

	public static function getQueryForReplyCode($replyCode) {
		return "SELECT * FROM " . self::$REQUEST_TABLE_NAME . " NATURAL JOIN  " . User::$USER_TABLE_NAME . " where " . self::$REQUEST_TABLE_CODE_COLUMN_NAME . "='$replyCode';";
	}

	public static function getInsertQuery($id, $replyCode, $artist, $song){
		return "INSERT INTO request (" . self::$REQUEST_TABLE_ID_COLUMN_NAME . ", " . self::$REQUEST_TABLE_CODE_COLUMN_NAME . ", " . self::$REQUEST_TABLE_SONG_COLUMN_NAME . ", " . self::$REQUEST_TABLE_ARTIST_COLUMN_NAME . ") VALUES ($id, '$replyCode', '$song', '$artist');";
	}

	public static function getSongsData($queryResult) {
		if (empty($queryResult)){
			if (!SessionManager::isLoggedIn())
				return null;
			$queryResult = MySql::rawQuery(self::getQueryForReplyCode(SessionManager::getReplyCode()));
			if (empty($queryResult))
				return null;
		}

		$songs = array();
		while ($songsData = $queryResult->fetch_assoc()){
			$song = array();
			$song[self::$RESPONSE_SONG_JSON_KEY] = $songsData[self::$REQUEST_TABLE_SONG_COLUMN_NAME];
			$song[self::$RESPONSE_ID_JSON_KEY] = $songsData[self::$REQUEST_TABLE_ID_COLUMN_NAME];
			$song[self::$RESPONSE_ARTIST_JSON_KEY] = $songsData[self::$REQUEST_TABLE_ARTIST_COLUMN_NAME];
			$songs[] = $song;
		}

		return $songs;
	}

	public static function getSongs($users, $songs, $includeJavascript = true) {
		if (empty($songs)){
			$songs = self::getSongsData(null);
			if (empty($songs))
				return null;
		}
		
		if (empty($users)){
			$users = User::getUserData(null);
			if (empty($users))
				return null;
		}

		$dropDown = "<select id='UserSelector'>";
		foreach ($users[User::$USER_USERS_JSON_KEY] as $id => $user) {
			if (!isset($firstId)) {
				$firstId = $id;
				$selectedHtml = "selected='selected'";
			} else 
				$selectedHtml = "";
  			$dropDown .= "<option value='$id' $selectedHtml>{$user[User::$USER_NAME_JSON_KEY]}</option>";
		}
		
		$dropDown .= "</select>";
		
		$form = $dropDown. "<form id='AddSong'><span>Artist:</span><input id='Artist' type='text'><span>Title:</span><input id='Song' type='text'><input class='Button Center' type='submit'></form>";

		$html  =  "<div class='Songs'>" . $form;
		$html .= "<div class='Header'><div class='Artist'>Artist</div><div class='Title'>Title</div></div><div class='Clear'></div>";
		foreach ($songs as $song)
			$html .= self::getSong($song[self::$RESPONSE_ID_JSON_KEY], $song[self::$RESPONSE_ARTIST_JSON_KEY], $song[self::$RESPONSE_SONG_JSON_KEY], $song[self::$RESPONSE_ID_JSON_KEY] != $firstId);
		$html .= "</div>\n";
		$javascript = DomManager::getScript('Scripts/Widgets/Songs.js');
		if ($includeJavascript)
			$html .= $javascript;
		return $html;
	}

	public static function getSong($id, $artist, $song, $isHidden){
		$hiddenHtml = "";
		if ($isHidden)
			$hiddenHtml = " Hidden";
		return "<div class='Song Id$id$hiddenHtml'><div class='Artist'>$artist</div><div class='Title'>$song</div></div><div class='Clear'></div>";
	}
}
?>