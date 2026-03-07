<?php
/**
 * Sputnik Plugin Handler Class
 * @version 2.0
 * @author Daniel Fekete - Voov Ltd.
 */


class PluginLoader {
	static $pluginsList = array();

	static function LoadPlugin($name, $o, $loadVars) {
		global $config;

		if(isset(PluginLoader::$pluginsList[$name])) return PluginLoader::$pluginsList[$name]; // Don't load the same plugin twice

		if (!isset($config["plugin_directory"])) $config["plugin_directory"] = "plugins/";
		require_once $config["plugin_directory"] . $name . ".plugin.php";

		// Keressük meg az osztály nevét
		$classes = get_declared_classes();
		$helper = new Helper();
		$key = false;
		foreach($classes as $index => $class) {
			if (strcasecmp($class, $name . "plugin") === 0) {
				$key = $index;
				break;
			}
		}
//		$key = $helper->array_nsearch($name . "plugin", $classes);

		if ($key == false) return null; // Nincs ilyen plugin

		$className = $classes[$key];
		PluginLoader::$pluginsList[$name] = new $className();
		PluginLoader::$pluginsList[$name]->SetBaseObject($o); // Engedj?k be?ll?tani a base objektumot

		// állítsuk be a hívónak az objektumait
		if ($o != false) {
			$vars = get_object_vars($o);
			$pluginObject = PluginLoader::$pluginsList[$name];
			$pluginClass = get_class($pluginObject);
			$supportsDynamicProperties = PHP_VERSION_ID < 80200 || method_exists($pluginObject, "__set");
			if (!$supportsDynamicProperties && method_exists("ReflectionClass", "getAttributes")) {
				$reflection = new ReflectionClass($pluginClass);
				$supportsDynamicProperties = count($reflection->getAttributes("AllowDynamicProperties")) > 0;
			}

			foreach($vars as $var_key => $var_value) {
				if (property_exists($pluginObject, $var_key)) {
					$pluginObject->$var_key = &$vars[$var_key];
					continue;
				}

				if ($supportsDynamicProperties && !isset($pluginObject->$var_key)) {
					$pluginObject->$var_key = &$vars[$var_key];
				}
			}
		}

		PluginLoader::$pluginsList[$name]->OnLoad($loadVars); // H?vjuk meg a plugin incializ?l?s?t

		return PluginLoader::$pluginsList[$name];
	}
}
?>
