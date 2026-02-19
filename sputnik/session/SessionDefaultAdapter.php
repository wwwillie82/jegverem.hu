<?php
require_once "sputnik/ISessionAdapter.php";
ini_set('session.use_trans_sid', false);

class SessionDefaultAdapter implements ISessionAdapter {
	
	var $lifetime = 1800; // seconds = 30 minutes
	
	function filter_host($var) {
		if($var == "www") return false;
		return true;
	}

	function  __construct() {
		// Setup default PHP session
		$url = array_filter(explode(".", $_SERVER["HTTP_HOST"]), array($this, "filter_host"));
		$domain = "." . implode(".", $url);
		session_set_cookie_params($this->lifetime, "/", $domain);
		if(!headers_sent()) {
			session_start();
			header("Cache-control: private");
			// overwrite the cookie's lifetime, so it gets new lifetime in each request
			setcookie(session_name(),session_id(),time()+$this->lifetime);
		} else {
			// trigger error
		}
	}
	
	function SetDomain($domain) {
        session_set_cookie_params(0, "/", $domain);
        session_regenerate_id(true);
    }

	function Get($var) {
		return $_SESSION[$var];
	}

	function Set($var, $value, $ttl=0) {
		if ($value == null) {
			// Clear the session
			$this->Clear($var);
		} else {
			// Set session
			$_SESSION[$var] = $value;
		}
	}

	function Clear($var) {
		unset($_SESSION[$var]);
	}

	function Is_set($var) {
		return isset($_SESSION[$var]);
	}

	function GetSessions() {
		if(!isset($_SESSION)) return array();
		return $_SESSION;
	}
}

?>
