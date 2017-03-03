<?php
namespace KirbyPluginInstaller;
use c;

function allow() {
	if(site()->user()) {
		$username = c::get('plugin.installer.username');
		if(is_string($username)) {
			if(site()->user()->username() == $username) return true;
		} elseif(is_array($username)) {
			if(in_array(site()->user()->username(), $username)) return true;
		} elseif(empty($username)) {
			return true;
		}
	}
}