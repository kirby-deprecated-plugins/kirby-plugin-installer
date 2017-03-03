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
		$name = str_replace('_', '', basename($plugin_path));
		$plugin_filepath = $plugin_path . DS . $name . '.php';
		if(f::exists($plugin_filepath)) return true;
	}

	function isEnabled($name) {
		$sanitized = str_replace('_', '', $name);
		if($name == $sanitized) return true;
	}

	function state($name) {
		return (!$this->isEnabled($name)) ? 'pi-disabled' : '';
	}

	function github($name) {
		$github_path = kirby()->roots()->plugins() . DS . $name . DS . 'github.url.txt';

		if(f::exists($github_path)) {
			return f::read($github_path);
		}
		return;
	}

	function notify() {
		switch(get('pi')){
			case 'install-success' :
				panel()->notify('Plugin installed!');
				break;
			case 'update-success' :
				panel()->notify('Plugin updated!');
				break;
			case 'delete-success' :
				panel()->notify('Plugin deleted!');
				break;
			case 'enable-success' :
				panel()->notify('Plugin enabled!');
				break;
			case 'disable-success' :
				panel()->notify('Plugin disabled!');
				break;
		}
	}

	function redirect() {
		if(get('pi')) {
			panel()->redirect('/');
		}
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