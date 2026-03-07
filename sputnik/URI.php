<?php

/**
 * URI Helper class
 * @author Daniel Fekete
 * @copyright 2010(c) VOOV Ltd.
 */



class URI {
	static $named_params = array();
	private static $static_path_prefixes = array("css", "js", "images", "images_admin", "ckeditor", "jcrop", "favicon.ico", "apple-touch-icon.png", "robots.txt", "sitemap.xml", "modules", "html_template", "sputnik", "plugins");

	private static function GetConfigValue($key, $default=false) {
		global $config;
		if(isset($config) && is_array($config) && array_key_exists($key, $config))
			return $config[$key];
		return $default;
	}

	public static function IsNoRewriteModeEnabled() {
		return self::GetConfigValue("routing_no_rewrite_mode", true);
	}

	private static function IsOutputRewriteFallbackEnabled() {
		$enabled = self::GetConfigValue("routing_output_rewrite_fallback", true);
		return self::IsNoRewriteModeEnabled() && $enabled;
	}

	private static function IsAbsoluteUrlModeEnabled() {
		return self::GetConfigValue("routing_makeurl_absolute", false);
	}

	private static function BuildNamedParamsPath($extend_named=array(), $force_own_params=false) {
		global $config;
		if(count(self::$named_params) <= 0 && count($extend_named) <= 0) return "";

		if($force_own_params == true)
			$named_params = $extend_named;
		else
			$named_params = array_merge(self::$named_params, $extend_named);

		$named_param_char = isset($config["namedparam_char"]) ? $config["namedparam_char"] : ":";
		$named_params_list = array();
		foreach($named_params as $key=>$value) {
			if(is_array($value)) {
				$value = implode("|", $value);
			}
			if(!empty($value))
				$named_params_list[] = "$key" . $named_param_char . "$value";
		}
		if(count($named_params_list) <= 0) return "";
		return "/" . implode("/", $named_params_list);
	}

	private static function IsSecureRequest() {
		if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "" && strtolower($_SERVER["HTTPS"]) !== "off")
			return true;
		if(isset($_SERVER["SERVER_PORT"]) && (string)$_SERVER["SERVER_PORT"] === "443")
			return true;
		if(isset($_SERVER["HTTP_X_FORWARDED_PROTO"])) {
			$proto = strtolower(trim(explode(',', $_SERVER["HTTP_X_FORWARDED_PROTO"])[0]));
			if($proto === "https") return true;
		}
		return false;
	}

	private static function ToAbsoluteUrl($path) {
		$host = isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : "";
		if($host === "") return $path;
		$scheme = self::IsSecureRequest() ? "https" : "http";
		return $scheme . "://" . $host . $path;
	}

	static function SetNamedParam($name, $value) {
		$name = htmlentities($name, ENT_COMPAT, "UTF-8");
		if(strpos($value, "|") !== false) {
			// The value supposed to be an array
			$value_array = explode("|", $value);
			//array_map("htmlentities", $value_array); // TODO: Find faster solution
			URI::$named_params[$name] = $value_array;
			
		} else {
			$value = htmlentities($value, ENT_COMPAT, "UTF-8");
            if(!empty($value) && $value != null && trim($value) != "")
			    URI::$named_params[$name] = $value;
		}
	}

	static function GetNamedParam($name, $default_value=false) {
		$name = html_entity_decode($name, ENT_COMPAT, "UTF-8");
		if(is_array(self::$named_params[$name])) $buffer = self::$named_params[$name];
		else $buffer = html_entity_decode(self::$named_params[$name], ENT_COMPAT, "UTF-8");
		if(empty($buffer)) return $default_value;
		return $buffer;
	}

	private static function GetRequestPath() {
		$uri = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : "/";
		$path = parse_url($uri, PHP_URL_PATH);
		if($path === null || $path === false || $path === "") $path = "/";

		if(self::IsNoRewriteModeEnabled()) {
			if(strpos($path, "/index.php/") === 0) {
				$path = substr($path, strlen("/index.php"));
			} elseif($path === "/index.php") {
				$path = "/";
			}
		}

		if($path === "") $path = "/";
		return $path;
	}

	public static function GetCurrentRoutePath() {
		return self::GetRequestPath();
	}

	public static function RoutePath($uri = "", $extend_named=array(), $force_own_params=false) {
		$uri = trim($uri, "/");
		$path = self::IsNoRewriteModeEnabled() ? "/index.php" : "";
		if($uri !== "") $path .= "/" . $uri;
		$path .= self::BuildNamedParamsPath($extend_named, $force_own_params);
		if($path === "") return "/";
		return $path;
	}

	private static function ShouldPrefixRoute($path) {
		if(!self::IsNoRewriteModeEnabled()) return false;
		if(empty($path)) return false;
		if($path[0] !== "/") return false;
		if(strpos($path, "//") === 0) return false;
		if(strpos($path, "/index.php") === 0) return false;

		$clean_path = parse_url($path, PHP_URL_PATH);
		if($clean_path === null || $clean_path === false || $clean_path === "") return false;
		if(stripos($clean_path, ".php") !== false) return false;

		$first_segment = trim(strtok(ltrim($clean_path, "/"), "/"));
		if($first_segment === "") return true;
		if(in_array($first_segment, self::$static_path_prefixes)) return false;
		if(strpos($first_segment, ".") !== false) return false;
		return true;
	}

	private static function PrefixRoutePath($path) {
		if(!self::ShouldPrefixRoute($path)) return $path;
		return "/index.php" . $path;
	}

	public static function ShouldRewriteOutputLinks($html) {
		if(!self::IsOutputRewriteFallbackEnabled()) return false;
		if(empty($html) || !is_string($html)) return false;
		if(stripos($html, "href=") === false && stripos($html, "action=") === false) return false;

		$require_html = self::GetConfigValue("routing_output_rewrite_require_html", true);
		if($require_html) {
			$is_html_like = (stripos($html, "<html") !== false || stripos($html, "<!doctype") !== false || stripos($html, "<body") !== false);
			if(!$is_html_like) return false;
		}
		return true;
	}

	public static function RewriteOutputLinks($html) {
		if(!self::ShouldRewriteOutputLinks($html)) return $html;

		return preg_replace_callback('/\b(href|action)=("|\')([^"\']+)\2/i', function($matches) {
			$attr = $matches[1];
			$quote = $matches[2];
			$url = $matches[3];
			if(preg_match('/^(?:[a-z][a-z0-9+.-]*:|#|mailto:|tel:|javascript:)/i', $url)) {
				return $matches[0];
			}
			return $attr . "=" . $quote . self::PrefixRoutePath($url) . $quote;
		}, $html);
	}


	static function RedirectToReferer() {
		$referer = $_SERVER["HTTP_REFERER"];
		if (headers_sent() == false)
			header("Location: $referer");
	}

	static function Redirect($uri) {
		if (headers_sent() == false)
			header("Location: " . $uri);
	}

	static function MakeURL($uri, $extend_named=array(), $force_own_params=false) {
		$host = isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : "";
		$ret = Hooks::GetInstance()->CallHookAtPoint("pre_makeurl", array($host, $uri));
		if ($ret != null)
			return $ret;

		$path = self::RoutePath($uri, $extend_named, $force_own_params);
		if(self::IsAbsoluteUrlModeEnabled()) {
			return self::ToAbsoluteUrl($path);
		}
		return $path;
	}
}

?>
