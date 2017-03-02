<?php
namespace KirbyPluginInstaller;

$list = new Listing();
?>
<script>
var base = '<?php echo u('plugin-installer/install/'); ?>';
$( document ).ready(function() {
	$("#plugin-installer-url").on("change paste keyup", function() {
		var url = $(this).val();
		var uri = url.replace(/.*?:\/\//g, "");
		$('#plugin-installer-link').attr('href', base + uri);
	});

	$('.pi-row').on('click', function() {
		$('.pi-actions').hide();
		$(this).next().show();
		$(this).parent().addClass('pi-active');
	});
});
</script>

<style>
#plugin-installer-url {
	    padding: .5em;
    font-size: 1em;
    line-height: 1.5em;
    font-weight: 400;
    border: 2px solid #ddd;
    background: #fff;
    display: block;
    -ms-appearance: none;
    appearance: none;
    border-radius: 0;
    min-height: 2.75em;
    width: 100%;

        margin-top: .5em;
}
#plugin-installer-wrap {
	text-align: right;
}
.pi-icon {
	display: flex;
	align-items: center;
	justify-content: center;
	margin-right: 1em;
}
.pi-icon .icon {
	top: 0;
}
.pi-icon .fa-warning{
	color: #b3000a;
}

.pi-action:hover {
	opacity: .5;
}

.pi-list ul {
	list-style: none;
}

.pi-row {
	display: flex;
	width: 100%;
	align-items: center;
	padding: .25em 0 .25em 0;
	cursor: pointer;
}

.pi-row:hover {
	/*background: #eee;*/
}

.pi-name {
	flex: 1;
}

.pi-actions {
	display: none;
	margin-bottom: 1em;
	margin-top: .25em;
}

.pi-actions .icon {
	top: 0;
}

.pi-actions .btn-repo {
	border-color: #0366d6;
	color: #0366d6;
}

.pi-actions .btn-repo:hover {
	color: #fff;
	background: #0366d6;
}
</style>

<div class="pi-list">
	<ul>
	<?php
	foreach(glob(kirby()->roots()->plugins() . DS . '*', GLOB_ONLYDIR) as $plugin_path) :
		if(empty($plugin_path)) continue;
		$name = basename($plugin_path);
	?>
		<li id="plugin_<?php echo $name; ?>">
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
					<?php echo $name; ?>
				</div>
				<div class="pi-version">
					<?php echo $list->version($plugin_path); ?>
				</div>
			</div>
			<div class="pi-actions">
				<a href="<?php echo u('plugin-installer/delete/' . $name); ?>" class="btn btn-negative btn-rounded"><i class="icon fa fa-trash"></i></a>
				<a href="" class="btn btn-rounded"><i class="icon fa fa-repeat"></i></a>
				<a href="" class="btn btn-rounded btn-repo"><i class="icon fa fa-github"></i></a>
			</div>
		</li>
	<?php endforeach; ?>
	</ul>
</div>

<input type="text" id="plugin-installer-url">

<div id="plugin-installer-wrap">
<a target="_top" class="btn btn-rounded" id="plugin-installer-link" href="<?php echo u('plugin-installer/install/'); ?>">Install</a>
</div>