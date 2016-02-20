<?php

class Database {
	private $host = "127.0.0.1";
	private $port = "8889";
	private $user = "root";
	private $pass = "root";

	protected $conn;

	public function __construct() {
		// Set up connection to the database

	}

	public function execute($sql) {
		// Execute raw sql statement


		return $result;
	}
}
