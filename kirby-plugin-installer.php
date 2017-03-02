<?php
require_once __DIR__ . DS . 'lib' . DS . 'install.php';
require_once __DIR__ . DS . 'lib' . DS . 'delete.php';
require_once __DIR__ . DS . 'lib' . DS . 'update.php';
require_once __DIR__ . DS . 'lib' . DS . 'routes.php';
require_once __DIR__ . DS . 'lib' . DS . 'list.php';
require_once __DIR__ . DS . 'lib' . DS . 'cache.php';

$kirby->set('widget',  'boiler-widget', __DIR__ . DS . 'widgets' . DS . 'boiler-widget');