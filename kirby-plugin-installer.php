<?php
require_once __DIR__ . DS . 'lib' . DS . 'install.php';
require_once __DIR__ . DS . 'lib' . DS . 'delete.php';
require_once __DIR__ . DS . 'lib' . DS . 'allow.php';
require_once __DIR__ . DS . 'lib' . DS . 'routes.php';
require_once __DIR__ . DS . 'lib' . DS . 'list.php';
require_once __DIR__ . DS . 'lib' . DS . 'cache.php';
require_once __DIR__ . DS . 'lib' . DS . 'state.php';

$kirby->set('widget',  'plugin-installer', __DIR__ . DS . 'widgets' . DS . 'plugin-installer');