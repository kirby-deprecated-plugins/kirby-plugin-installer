<?php
namespace KirbyPluginInstaller;
use c;
use panel;

if(allow()) {
	kirby()->routes(array(
		array(
			'pattern' => 'plugin-installer/install/(:all)',
			'action'  => function($uri) {
				$Install = new Install();
				if($Install->plugin($uri)){
					go(kirby()->urls()->index() . '/' . c::get('plugin.installer.panel.uri', 'panel') . '/?pi=install-success');
				}
			}
		),
		array(
			'pattern' => 'plugin-installer/update/(:all)',
			'action'  => function($uri) {
				$Install = new Install();
				if($Install->plugin($uri)){
					go(kirby()->urls()->index() . '/' . c::get('plugin.installer.panel.uri', 'panel') . '/?pi=update-success');
				}
			}
		),
		array(
			'pattern' => 'plugin-installer/delete/(:any)',
			'action'  => function($folder) {
				$Delete = new Delete();
				if($Delete->folder($folder)) {
					go(kirby()->urls()->index() . '/' . c::get('plugin.installer.panel.uri', 'panel') . '/?pi=delete-success');
				}
			}
		),
		array(
			'pattern' => 'plugin-installer/enable/(:any)',
			'action'  => function($folder) {
				$State = new State();
				if($State->enable($folder)) {
					go(kirby()->urls()->index() . '/' . c::get('plugin.installer.panel.uri', 'panel') . '/?pi=enable-success');
				}
			}
		),
		array(
			'pattern' => 'plugin-installer/disable/(:any)',
			'action'  => function($folder) {
				$State = new State();
				if($State->disable($folder)) {
					go(kirby()->urls()->index() . '/' . c::get('plugin.installer.panel.uri', 'panel') . '/?pi=disable-success');
				}
			}
		),
	));
}