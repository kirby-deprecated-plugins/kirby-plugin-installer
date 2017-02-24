<?php

function fetch_something($url) {
	echo $url;
	echo __DIR__ . DS . 'cacert.pem';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
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

function unzip($file) {
	$zip = new ZipArchive;
	$res = $zip->open($file);
	if ($res === TRUE) {
		$zip->extractTo(kirby()->roots()->plugins());
		$zip->close();
		echo 'woot!';
	} else {
		echo 'doh!';
	}
}

kirby()->routes(array(
	array(
		'pattern' => 'plugin-installer/install/(:all)',
		'action'  => function($uri) {
			if(!str::startsWith($uri, 'github.com/')) return;
			$parts = explode('/', $uri);
			$repo_name = end($parts);
			$repo_path = kirby()->roots()->plugins() . DS . $repo_name;
			$url = 'https://' . $uri . '/archive/master.zip';
			$content = fetch_something($url);
			f::write(kirby()->roots()->plugins() . DS . 'plugin.zip', $content);
			unzip(kirby()->roots()->plugins() . DS . 'plugin.zip');
			rename($repo_path . '-master', $repo_path);
			go(kirby()->urls()->index() . '/panel/');
		}
	)
));