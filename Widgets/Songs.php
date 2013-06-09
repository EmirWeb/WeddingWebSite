<?php
include_once ( $_SERVER['DOCUMENT_ROOT'] . '/WeddingWebSite/Utils/DomManager.php');
include_once ( $_SERVER['DOCUMENT_ROOT'] . '/WeddingWebSite/Widgets/User.php');

class Songs {

	public static $REQUEST_TABLE_NAME = "request";
	public static $REQUEST_TABLE_ID_COLUMN_NAME = "id";
	public static $REQUEST_TABLE_USER_ID_COLUMN_NAME = "userId";
	public static $REQUEST_TABLE_CODE_COLUMN_NAME = "code";
	public static $REQUEST_TABLE_SONG_COLUMN_NAME = "song";
	public static $REQUEST_TABLE_ARTIST_COLUMN_NAME = "artist";

	public static $RESPONSE_SONG_JSON_KEY = "song";
	public static $RESPONSE_ID_JSON_KEY = "id";
	public static $RESPONSE_USER_ID_JSON_KEY = "userId";
	public static $RESPONSE_ARTIST_JSON_KEY = "artist";

	public static function getQueryForUserId($userId) {
		return "SELECT * FROM  " . self::$REQUEST_TABLE_NAME . " NATURAL JOIN  " . User::$USER_TABLE_NAME . " where " . self::$REQUEST_TABLE_USER_ID_COLUMN_NAME . "='$userId';";
	}
	
	
	public static function getDeleteQuery($id) {
		return "DELETE FROM " . self::$REQUEST_TABLE_NAME . " where " . self::$REQUEST_TABLE_ID_COLUMN_NAME . "='$id';";
	}

	public static function getQueryForReplyCode($replyCode) {
		return "SELECT * FROM " . self::$REQUEST_TABLE_NAME . " where " . self::$REQUEST_TABLE_CODE_COLUMN_NAME . "='$replyCode';";
	}

	public static function getInsertQuery($userId, $replyCode, $artist, $song){
		return "INSERT INTO " . self::$REQUEST_TABLE_NAME . " (" . self::$REQUEST_TABLE_USER_ID_COLUMN_NAME . ", " . self::$REQUEST_TABLE_CODE_COLUMN_NAME . ", " . self::$REQUEST_TABLE_SONG_COLUMN_NAME . ", " . self::$REQUEST_TABLE_ARTIST_COLUMN_NAME . ") VALUES ($userId, '$replyCode', '$song', '$artist');";
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
			$song[self::$RESPONSE_ID_JSON_KEY] = $songsData[self::$REQUEST_TABLE_ID_COLUMN_NAME];
			$song[self::$RESPONSE_SONG_JSON_KEY] = $songsData[self::$REQUEST_TABLE_SONG_COLUMN_NAME];
			$song[self::$RESPONSE_USER_ID_JSON_KEY] = $songsData[self::$REQUEST_TABLE_USER_ID_COLUMN_NAME];
			$song[self::$RESPONSE_ARTIST_JSON_KEY] = $songsData[self::$REQUEST_TABLE_ARTIST_COLUMN_NAME];
			$songs[] = $song;
		}

		return $songs;
	}

	public static function getSongs($users, $songs, $includeJavascript = true) {
		if (empty($songs)){
			$songs = self::getSongsData(null);
		}

		if (empty($users)){
			$users = User::getUserData(null);
			if (empty($users))
				return null;
		}

		$dropDown = "<select id='UserSelector'>";
		foreach ($users[User::$USER_USERS_JSON_KEY] as $userId => $user) {
			if (!isset($firstId)) {
				$firstId = $userId;
				$selectedHtml = "selected='selected'";
			} else
				$selectedHtml = "";
			$dropDown .= "<option value='$userId' $selectedHtml>{$user[User::$USER_NAME_JSON_KEY]}</option>";
		}

		$dropDown .= "</select><div class='Clear'></div>";

		$form = $dropDown. "<form id='AddSong'><span class='Item'>Artist:<input class='Item' id='Artist' type='text'><br>Title:<input class='Item' id='Song' type='text'><input class='Button Center' type='submit' value='SUBMIT'></span><div class='Clear'></div></form>";

		$html  =  "<div class='Songs'>" . $form;
		$html .= "<div class='SongList'><div class='Header'><div class='Item Artist'>Artist</div><div class='Item Title'>Title</div><div class='Clear'></div></div><div class='Clear'></div>";
		foreach ($songs as $song){
			$userId = $song[self::$RESPONSE_USER_ID_JSON_KEY];
			if (isset($counter[$userId]))
				$counter[$userId]++;
			else
				$counter[$userId] = 0;
			$hasHighlight = $counter[$userId] % 2 == 0;
				
			$id = $song[self::$RESPONSE_ID_JSON_KEY];
			$isHidden = $userId != $firstId;
			$artist = $song[self::$RESPONSE_ARTIST_JSON_KEY];
			$songTitle = $song[self::$RESPONSE_SONG_JSON_KEY];
			$html .= self::getSong($id, $userId, $artist, $songTitle, $isHidden, $hasHighlight);
		}
		$html .= "<div class='Clear'></div></div></div><div class='Clear'>\n";
		if ($includeJavascript){
			$javascript = DomManager::getScript('Scripts/Widgets/Songs.js');
			$html .= $javascript;
		}
		return $html;
	}

	public static function getSong($id, $userId, $artist, $song, $isHidden, $hasHighlight){
		$artist = MySql::unescapeString($artist);
		$song = MySql::unescapeString($song);
		$hiddenHtml = "";
		if ($isHidden)
			$hiddenHtml = " Hidden";

		$highlightHtml = "";
		if ($hasHighlight)
			$highlightHtml = " Highlight";
		return "<div id='SongId$id' class='Song UserId$userId$hiddenHtml$highlightHtml'><div onclick='deleteSong($id)' class='Item ClearButton' id='ClearButton$id'>-</div><div class='Item Artist'>$artist</div><div class='Item Title'>$song</div><div class='Clear'></div></div>";
	}
}
?>