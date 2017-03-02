<?php
namespace KirbyPluginInstaller;

class Install {
	function plugin() {
		if(!str::startsWith($uri, 'github.com/')) return;
		$parts = explode('/', $uri);
		$repo_name = end($parts);
		$repo_path = kirby()->roots()->plugins() . DS . $repo_name;
		$url = 'https://' . $uri . '/archive/master.zip';
		$content = fetch_something($url);
		f::write(kirby()->roots()->plugins() . DS . 'plugin.zip', $content);
		unzip(kirby()->roots()->plugins() . DS . 'plugin.zip');
		rename($repo_path . '-master', $repo_path);
		go(kirby()->urls()->index() . '/' . c::get('plugin.installer.panel', 'panel') . '/');
	}
}