<?php
// This .php file is a part of STEAMPHP, licensed under GNU GENERAL PUBLIC LICENSE v3.
// Made by moriczgergo a.k.a. skiilaa
// Created: 2017.01.19
// Last modified: 2017.01.19

class SteamPHP
{
	private $key = "";
	private $storedSteamID = "";

	function __construct($newKey, $newSteamID = "") {
		global $key, $steamID;
		$key = strval($newKey);
		$storedSteamID = strval($newSteamID);
	}

	public function ResolveVanityURL($vanityURL, $remember = false){
		global $storedSteamID;

		if ($remember && $storedSteamID == ""){
			$storedSteamID = $preferredSteamID;
			$preferredSteamID = $storedSteamID;
		}

		$ch = curl_init(); // Init curl
		/* CURL SETTINGS */
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, "http://api.steampowered.com/ISteamUser/ResolveVanityURL/v0001/?key=" . $key . "&vanityurl=" . preg_replace('/\s+/', '+', $preferredSteamID));

		// execute get
		$content = curl_exec($ch);

		// json to object
		$responseObject = json_decode($content);

		if ($responseObject === NULL) { // error checking
			return -1; // response wasn't json
		}

		// object to array
		$responseArray = (array)$responseObject;
		$responseArrayResponseArrray = (array)$responseArray["response"];

		// get success value
		$success = $responseArrayResponseArrray["success"];
		if($success == 42){ // error checking
			return -2; // user not found
		} elseif ($success == 1) {
			if ($remember === TRUE){
				$storedSteamID = $responseArrayResponseArrray["steamid"];
			}
			return $responseArrayResponseArrray["steamid"]; // return steamid64 value
		} else {
			return -3; // unknown error
		}
	}
}
?>