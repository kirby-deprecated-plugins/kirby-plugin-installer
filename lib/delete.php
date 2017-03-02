<?php
namespace KirbyPluginInstaller;
use f;
use dir;
use c;
use str;

class Delete {
	function folder($folder) {
		if(!$this->allowed()) return;
		return $this->delete();
	}

	function run($folder) {
		if($this->folder($folder)) {
			go(kirby()->urls()->index() . '/' . c::get('plugin.installer.panel', 'panel') . '/');
		} else {
			die('Could not delete folder!');
		}
	}

	function delete($folder) {
		$path = kirby()->roots()->plugins() . DS . $folder;
		if(!f::exists($path)) return true;
		return dir::remove($path);
	}

	function allowed() {
		if(empty($folder)) return;
		if(str::contains($folder, '.')) return;
		if(str::contains($folder, DS)) return;
		return true;
	}
}