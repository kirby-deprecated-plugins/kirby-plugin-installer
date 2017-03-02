<?php
namespace KirbyPluginInstaller;
use f;

class Listing {
	function isTypePlugin($plugin_path) {
		$Cache = new Cache();
		$package = $Cache->package($plugin_path);

		$plugin_name = basename($plugin_path);

		if(isset($package[$plugin_name]->type)) {
			if($package[$plugin_name]->type != 'kirby-plugin') {
				return false;
			}
		}
		return true;
	}

	function isExecutable($plugin_path) {
		$plugin_filepath = $plugin_path . DS . basename($plugin_path) . '.php';
		if(f::exists($plugin_filepath)) return true;
	}

	function version($plugin_path) {
		$Cache = new Cache();
		$package = $Cache->package($plugin_path);

		$plugin_name = basename($plugin_path);

		if(isset($package[$plugin_name]->version)) {
			return $package[$plugin_name]->version;
		}
	}
}