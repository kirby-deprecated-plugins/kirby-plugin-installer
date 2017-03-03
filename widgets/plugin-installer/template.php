<?php
namespace KirbyPluginInstaller;
use str;

$list = new Listing();
$list->notify();
$list->redirect();
?>
<script>
var base = '<?php echo u('plugin-installer/install/'); ?>';
</script>
<?php require_once __DIR__ . DS . 'js.php'; ?>
<?php require_once __DIR__ . DS . 'css.php'; ?>

<div class="pi-list">
	<ul>
	<?php
	$folders = glob(kirby()->roots()->plugins() . DS . '*', GLOB_ONLYDIR);

	usort($folders, function($a, $b) {
		$a = basename($a);
		$b = basename($b);

		if(str::startsWith($a, '_')) $a = str::after($a, '_');
		if(str::startsWith($b, '_')) $b = str::after($b, '_');

		return strcmp($a, $b);
	});

	foreach($folders as $plugin_path) :
		if(empty($plugin_path)) continue;
		$name = basename($plugin_path);
		$sanitized = str_replace('_', '', $name);
	?>
		<li id="plugin_<?php echo $name; ?>" class="<?php echo $list->state($name); ?>">
			<div class="pi-row">
				<div class="pi-icon">
					<?php if(!$list->isTypePlugin($plugin_path)) : ?>
						<i title="Type is not 'kirby-plugin'" class="icon fa fa-warning"></i>
					<?php elseif(!$list->isExecutable($plugin_path)) : ?>
						<i title="File does not match folder" class="icon fa fa-warning"></i>
					<?php else : ?>
						<i class="icon fa fa-folder-o"></i>
					<?php endif; ?>
				</div>
				<div class="pi-name">
					<?php echo $sanitized; ?>
				</div>
				<div class="pi-version">
					<?php echo $list->version($plugin_path); ?>
				</div>
			</div>
			<div class="pi-actions">
				<a target="_top" href="<?php echo u('plugin-installer/delete/' . $name); ?>" class="btn btn-negative btn-rounded">
					<i class="icon fa fa-trash"></i>
				</a>
				<?php if(!$list->isEnabled($name)) : ?>
					<a target="_top" href="<?php echo u('plugin-installer/enable/' . $sanitized); ?>" class="btn btn-rounded">
						<i class="icon fa fa-toggle-off"></i>
					</a>
				<?php endif; ?>
				<?php if($list->isEnabled($name)) : ?>
					<a target="_top" href="<?php echo u('plugin-installer/disable/' . $sanitized); ?>" class="btn btn-rounded">
						<i class="icon fa fa-toggle-on"></i>
					</a>
				<?php endif; ?>
				<?php if($list->github($name)) : ?>
						<a href="<?php echo u('plugin-installer/update/' . $list->github($name)); ?>" class="btn btn-rounded">
							<i class="icon fa fa-repeat"></i>
						</a>
						<a target="_blank" href="https://<?php echo $list->github($name); ?>" class="btn btn-rounded btn-repo">
							<i class="icon fa fa-github"></i>
						</a>
				<?php endif; ?>
			</div>
		</li>
	<?php endforeach; ?>
	</ul>
</div>

<h2>Install plugin</h2>

<input type="url" id="plugin-installer-url" placeholder="https://github.com/user/repository">

<div id="plugin-installer-wrap">
<a target="_top" class="btn btn-rounded" id="plugin-installer-link" href="<?php echo u('plugin-installer/install/'); ?>">Install</a>
</div>