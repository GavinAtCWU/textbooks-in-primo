<?php

class TIP {


	const OCLC_OAUTH_URL = 'https://oauth.oclc.org/token?grant_type=client_credentials&scope=WorldCatMetadataAPI';


	private function get_worldcat_access_token($worldcat_client_id, $worldcat_secret) {
		$headers = array(
			'Authorization: Basic ' . base64_encode($worldcat_client_id . ':' . $worldcat_secret)
		);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, self::OCLC_OAUTH_URL);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POST, true);
		$response = json_decode(curl_exec($curl));
		return $response;
	}


	public function get_isbns_worldcat($original_isbn, $worldcat_client_id, $worldcat_secret, $worldcat_api_url_base, $test_mode_only = false) {
		$token_response = $this->get_worldcat_access_token($worldcat_client_id, $worldcat_secret);
		if($test_mode_only) {
			if(isset($token_response->access_token)) {
				print "<p class=\"success\">&hearts; Valid WorldCat API access token returned: " . $token_response->access_token . "</p>\n";
			}
			else {
				print "<p class=\"error\">!! API access token not returned: '" . $token_response->message . "'</p>\n";
			}
		}
		$curl = curl_init();
		$headers = array(
			"Authorization: Bearer " . $token_response->access_token
		);
		curl_setopt($curl, CURLOPT_URL, $worldcat_api_url_base . $original_isbn);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POST, false);
		$response = json_decode(curl_exec($curl));
		if($test_mode_only) {
			if(isset($response->briefRecords)) {
				print "<p class=\"success\">&hearts; WorldCat Search API working.</p>\n";
			}
			else {
				print "<p class=\"error\">!! WorldCat Search API not working.</p>\n";
			}
		}
		else {
			//
		}
	}


	public function get_isbns_primo($original_isbn, $primo_search_api_url, $test_mode_only = false) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, str_replace('ISBN', $original_isbn, $primo_search_api_url));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, false);
		$response = json_decode(curl_exec($curl));
		if($test_mode_only) {
			if(isset($response->info->total)) {
				print "<p class=\"success\">&hearts; Primo Search API working.</p>\n";
			}
			else {
				print "<p class=\"error\">!! Primo Search API not working.</p>\n";
			}
		}
		else {
			//
		}
	}


}

?>
