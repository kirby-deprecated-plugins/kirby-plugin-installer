<?php
namespace KirbyPluginInstaller;
use f;
use dir;
use c;
use str;

class Delete {
	function folder($folder) {
		if(!$this->allowed($folder)) return;
		return $this->delete($folder);
	}

	function delete($folder) {
		$path = kirby()->roots()->plugins() . DS . $folder;
		if(!f::exists($path)) return true;
		return dir::remove($path);
	}

	function allowed($folder) {
		if(empty($folder)) return;
		if(str::contains($folder, '.')) return;
		if(str::contains($folder, DS)) return;
		return true;
	}
}