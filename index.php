<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);


	// Include Libraries
	require "api/github_search.php";
	require "libs/database.php";



	// Init and run the github api query
	$github = new Github();
	$github->executeSearch();


	
	// Build View
	require 'view/header.php';
	require 'view/view_data.php';
	require 'view/footer.php';
