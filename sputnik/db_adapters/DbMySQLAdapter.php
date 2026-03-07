<?php

require_once __DIR__ . "/../IDbAdapter.php";
 
class DbMySQLAdapter implements IDbAdapter {

	private $connection = null;

	public function Info() {
		return mysqli_get_server_info($this->connection);
	}

	public function EscapeString($string) {
		return mysqli_real_escape_string($this->connection, $string);
	}

	public function Query($query_string) {
		return mysqli_query($this->connection, $query_string);
	}

	public function SwitchDb($db) {
		mysqli_select_db($this->connection, $db);
	}

	public function Disconnect() {
		if ($this->connection) {
			mysqli_close($this->connection);
		}
	}

	public function Connect($server, $username, $password) {
		$this->connection = mysqli_connect($server, $username, $password);
		return $this->connection;
	}

	public function GetInsertedId() {
		return mysqli_insert_id($this->connection);
	}

	public function GetAffectedRows() {
		return mysqli_affected_rows($this->connection);
	}

	public function GetError() {
		return mysqli_error($this->connection);
	}
}
