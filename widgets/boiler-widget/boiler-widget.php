<?php 
// https://getkirby.com/docs/developer-guide/panel/widgets

return array(
	'title' => array(
		'text' => 'Plugin installer',
		'compressed' => false
	),
	'html' => function() {
		return tpl::load( __DIR__ . DS . 'template.php', array(
			'site' => panel()->site(),
			'page' => panel()->page('about')
		));
	}  
);