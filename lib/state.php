<?php
namespace KirbyPluginInstaller;
use str;

class State {
	function enable($folder) {
		if(!$this->allowed($folder)) return;
		$folder = $this->removeUnderscore($folder);
		$from = kirby()->roots()->plugins() . DS . '_' . $folder;
		$to = kirby()->roots()->plugins() . DS . $folder;
		return rename($from, $to);
	}

	function disable($folder) {
		if(!$this->allowed($folder)) return;
		$folder = $this->removeUnderscore($folder);
		$from = kirby()->roots()->plugins() . DS . $folder;
		$to = kirby()->roots()->plugins() . DS . '_' . $folder;
		return rename($from, $to);
	}

	function allowed($folder) {
		if(empty($folder)) return;
		if(str::contains($folder, '.')) return;
		if(str::contains($folder, DS)) return;
		return true;
	}

	function removeUnderscore($folder) {
		return str_replace('_', '', $folder);
	}
}