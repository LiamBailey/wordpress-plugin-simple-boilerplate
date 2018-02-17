<?php
/**
* Plugin Name: PB
* Description: Plugin Extension Boilerplate
* Version: 1.0.0
* Author: Liam Bailey
* Author URI: http://webbyscots.com/
* License: GNU General Public License v3.0
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/


class Plugin_Boilerplate {

	private $textdomain = "pb";
	private $required_plugins = array();
	public static $_instance;

	function have_required_plugins() {
		if (empty($this->required_plugins))
			return true;
		$active_plugins = (array) get_option('active_plugins', array());
		if (is_multisite()) {
			$active_plugins = array_merge($active_plugins, get_site_option('active_sitewide_plugins', array()));
		}
		foreach ($this->required_plugins as $key => $required) {
			$required = (!is_numeric($key)) ? "{$key}/{$required}.php" : "{$required}/{$required}.php";
			if (!in_array($required, $active_plugins) && !array_key_exists($required, $active_plugins))
				return false;
			}
		return true;
	}

	function __construct() {
		if (!$this->have_required_plugins())
			return;
		load_plugin_textdomain($this->textdomain, false, dirname(plugin_basename(__FILE__)) . '/languages');
		spl_autoload_register(array($this,'autoload'));
       	$this->init();
	}

	private function init() {

	}

	/* Autoload Classes */
   	function autoload($class) {
       	$class = strtolower(str_replace("_","-",$class));
       	$class_file = untrailingslashit(plugin_dir_path(__FILE__)) ."/includes/{$class}.php";
       	if (file_exists($class_file)) {
           	include_once($class_file);
       	}
   	}

	public static function instance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}

/* Use this function to call up the class from anywahere
like PB()->class_method();
 */
function PB() {
	return PB::instance();
}

PB();
