<script>
$( document ).ready(function() {
	$("#plugin-installer-url").on('change paste keyup', function() {
		var url = $(this).val();
		var uri = url.replace(/.*?:\/\//g, "");
		$('#plugin-installer-link').attr('href', base + uri);
		if(uri) {
			$('#plugin-installer-wrap').show();
		} else {
			$('#plugin-installer-wrap').hide();
		}
	});

	$('.pi-row').on('click', function() {
		$('.pi-actions').not($(this).next()).hide();
		if($(this).next().is(':visible')) {
			$(this).next().hide();
		} else {
			$(this).next().show();
		}
	});

	$('#plugin-installer-url').on('keyup', function (e) {
		if(e.keyCode == 13) {
			window.location.href = $('#plugin-installer-link').attr('href');
		}
	});
});
</script>