<?php

class Github {
	private $github_user = "";
	private $github_pass = "";
	
	protected $api_url = "https://api.github.com/search/repositories?";

	protected $api_query;	
	protected $query_result;

	public function __construct() {
		// Set up class to execute API call
		$this->api_query = $this->api_url . 'q=language:php&sort=stars&order=desc';
	}
	
	public function executeSearch() {
		$userpass = $this->github_user . ":" . $this->github_pass;
		
		// Send built API url
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->api_query);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERAGENT, "veracity4life");
		curl_setopt($curl, CURLOPT_USERPWD, $userpass);

		$this->query_result = curl_exec ($curl);
		curl_close ($curl);
	
		// IF successful API call save data to DB
		if(!$this->query_result) {
			die("False read from github.");
		} else {
			$this->saveData();
		}
		
	}
	
	private function saveData() {
		// Save/Update data to/in DB
		
	}
}