<script>
var base = '<?php echo u('plugin-installer/install/'); ?>';
$( document ).ready(function() {
	$("#plugin-installer-url").on("change paste keyup", function() {
		var url = $(this).val();
		var uri = url.replace(/.*?:\/\//g, "");
		$('#plugin-installer-link').attr('href', base + uri);
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

        margin-bottom: .5em;
}

#plugin-installer-table {
	margin-top: 1em;
	border-collapse: collapse;
		width: 100%;
		box-sizing: border-box;
}


#plugin-installer-table td,
#plugin-installer-table th {
		padding: .5em;
		padding: .25em 0 .25em 0;
		text-align: left;
}

#plugin-installer-table td:first-child {
	padding: 0;
	padding-right: 0.5em;
	width: 1px;
}
#plugin-installer-wrap {
	text-align: right;
}
</style>

<input type="text" id="plugin-installer-url">

<div id="plugin-installer-wrap">
<a target="_top" class="btn btn-rounded" id="plugin-installer-link" href="<?php echo u('plugin-installer/install/'); ?>">Install</a>
</div>

<table id="plugin-installer-table">
	<tr>
		<th></th>
		<th>Name</th>
	</tr>
<?php foreach(glob(kirby()->roots()->plugins() . DS . '*', GLOB_ONLYDIR) as $folder) : ?>
	<tr>
		<td>
			<i class="icon icon-left fa fa-folder-o"></i>
		</td>
		<td>
			<?php echo basename($folder); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>