<?php
namespace KirbyPluginInstaller;
use str;
use f;
use c;
use ZipArchive;

class Install {
	function plugin($uri) {
		if(!str::startsWith($uri, 'github.com/')) return;
		$this->set($uri);

		$Delete = new Delete();
		$Delete->folder($this->name);

		$this->content = $this->download();
		if(empty($this->content)) return;
		if(!$this->saveFile()) return;
		if(!$this->unzip()) return;
		if(!$this->rename()) return;
		$this->trace();
		return true;
	}

	function set($uri) {
		$parts = explode('/', $uri);
		$name = end($parts);
		$this->repo = $uri;
		$this->name = $name;
		$this->path = kirby()->roots()->plugins() . DS . $name;
		$this->url = 'https://' . $uri . '/archive/master.zip';
	}

	function saveFile() {
		return f::write(kirby()->roots()->plugins() . DS . 'plugin.zip', $this->content);
	}

	function unzip() {
		$filepath = kirby()->roots()->plugins() . DS . 'plugin.zip';
		$zip = new ZipArchive;
		$res = $zip->open($filepath);

		if($res === TRUE) {
			$success = $zip->extractTo(kirby()->roots()->plugins());
			$zip->close();
			return $success;
		}
		return;
	}

	function rename() {
		return rename($this->path . '-master', $this->path);
	}

	function trace() {
		f::write($this->path . DS . 'github.url.txt', $this->repo);
	}

	function download() {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CAINFO, __DIR__ . DS . 'cacert.pem');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$contents = curl_exec($ch);
		if (curl_errno($ch)) {
			echo curl_error($ch);
			echo "n<br />";
			$contents = '';
		} else {
			curl_close($ch);
		}

		if (!is_string($contents) || !strlen($contents)) {
			echo "Failed to get contents.";
			$contents = '';
		}

		return $contents;
	}
}