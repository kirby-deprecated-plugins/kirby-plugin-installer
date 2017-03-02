<?php
namespace KirbyPluginInstaller;
use f;

class Cache {
	function package($plugin_path) {
		$kirby = kirby();
		$package_path = $plugin_path . DS . 'package.json';
		$data = $kirby->get('option', 'pi.data');

		if(!empty($data[basename($plugin_path)])) return $data;
		if(!f::exists($package_path)) return $data;

		$package_content = f::read($package_path);
		$data[basename($plugin_path)] = json_decode($package_content);
		$kirby->set('option', 'pi.data', $data);

		return $data;
	}
}