<?php

require_once "sputnik/IDbAdapter.php";
 
class DbMySQLAdapter implements IDbAdapter {

	private $connection = null;

	/**
	 * @return string
	 */
	public function Info() {
		return mysqli_get_server_info($this->connection);
	}

	/**
	 * @param  $string
	 * @return string
	 */
	public function EscapeString($string) {
		return mysqli_real_escape_string($this->connection, $string);
	}

	/**
	 * @param  $query_string
	 * @return resource
	 */
	public function Query($query_string) {
		return mysqli_query($this->connection, $query_string);
	}

	/**
	 * @param  $db
	 * @return void
	 */
	public function SwitchDb($db) {
		mysqli_select_db($this->connection, $db);
	}

	/**
	 * @return void
	 */
	public function Disconnect() {
		if($this->connection)
			mysqli_close($this->connection);
	}

	/**
	 * @param  $server
	 * @param  $username
	 * @param  $password
	 * @return resource the connection
	 */
	public function Connect($server, $username, $password) {
		$this->connection = mysqli_connect($server, $username, $password);
		if($this->connection) {
			mysqli_set_charset($this->connection, "utf8mb4");
		}
		return $this->connection;
	}

	/**
	 * @return int
	 */
	public function GetAffectedRows() {

		return mysqli_affected_rows($this->connection);
	}

	/**
	 * @return int
	 */
	public function GetInsertedId() {
		return mysqli_insert_id($this->connection);
	}

	/**
	 * 
	 * @return string
	 */
	public function GetError() {
		return mysqli_error($this->connection);
	}
}
