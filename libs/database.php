<?php

class Database {
	private $host = "127.0.0.1";
	private $port = "8889";
	private $user = "root";
	private $pass = "root";
	private $database = "victr";

	protected $conn;

	public function __construct() {
		$this->conn = new Mysqli($this->host, $this->user, $this->pass, $this->database, intval($this->port));

		if (mysqli_connect_errno()) {
			trigger_error('Database connection failed: '  . mysqli_connect_error(), E_USER_ERROR);
		}
	}

	function __destruct() {
		$this->conn->close();
	}

	public function error() {
		return mysqli_error($this->conn);
	}

	private function perform($parameters) {
		$sql = '';
		if ((count($parameters) == 2) && is_array($parameters[1])) {
			for ($i = count($parameters[1]); $i >= 0; $i-=1) {
				$parameters[$i+1] = $parameters[1][$i];
			}
		}
		$bindings = explode('?', $parameters[0]);
		for ($i = 0; $i < count($bindings) - 1; $i+=1) {
			$value = mysqli_real_escape_string($this->conn, trim($parameters[$i+1]));
			$sql .= $bindings[$i] . (($value != '')?("'" . $value . "'"):"NULL");
		}
		$sql .= $bindings[count($bindings) - 1];

		if($result = $this->conn->query($sql)) {
		} else {
			print_r($this->error());
		}
		return $result;
	}

	public function execute() {
		$result = $this->perform(func_get_args());
		return;
	}

	public function insert() {
		$result = $this->perform(func_get_args());
		return mysqli_insert_id($this->conn);
	}

	public function get_array() {
		$result = $this->perform(func_get_args());
		$array = array();
		while ($row = $result->fetch_array(MYSQLI_NUM)) {
			array_push($array, $row);
		}
		mysqli_free_result($result);
		return $array;
	}

	public function get_list() {
		$result = $this->perform(func_get_args());
		$array = array();
		while ($row = $result->fetch_array(MYSQLI_NUM)) {
			array_push($array, $row[0]);
		}
		mysqli_free_result($result);
		return $array;
	}

	public function get_row() {
		$result = $this->perform(func_get_args());
		$array = array();
		if ($row = $result->fetch_array(MYSQLI_NUM)) {
			mysqli_free_result($result);
			return $row;
		}
		mysqli_free_result($result);
		return null;
	}

	public function get_value() {
		$result = $this->perform(func_get_args());
		$array = array();
		if ($row = $result->fetch_array(MYSQLI_NUM)) {
			mysqli_free_result($result);
			return $row[0];
		}
		mysqli_free_result($result);
		return null;
	}

	public function close_conn() {
		$this->conn->close();
	}
}
