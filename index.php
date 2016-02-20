<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	// Include Libraries
	require "api/github_search.php";
	require "libs/database.php";
	require "libs/functions.php";
	require "libs/session.php";


	// Init App
	Session::init();

	$github = new Github();
	$db = new Database();


	// Check for session - If no session, set session and get data
	if(!Session::get("api_victr")) {
		Session::set("api_victr", true);

		$github->executeSearch();
		saveData($db, $github->query_result);
	}

	

	// Build View
	require 'view/header.php';
	require 'view/view_data.php';
	require 'view/footer.php';
