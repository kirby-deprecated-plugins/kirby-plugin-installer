<?php 
if(panel()->user()->username() == c::get('plugin.installer.user')) {
	return array(
		'title' => array(
			'text' => 'Plugin installer',
			'compressed' => true
		),
		'html' => function() {
			return tpl::load( __DIR__ . DS . 'template.php', array(
				'site' => panel()->site(),
				'page' => panel()->page('about')
			));
		}  
	);
} else {
	return false;
}