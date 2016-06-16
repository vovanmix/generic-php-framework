<?php /**
 * @var \App\Helpers\CopyHelper $copy
 * @var string $templates
 * @var StdClass $assets
 * @var array $manifest
 */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Admin panel</title>
		<link rel="stylesheet" href="<?=$assets->location?>/admin_assets/<?=$manifest['stylesheets/app.css']?>"/>
	</head>
	<body>
		<div class="container">
			<div id="content"></div>
		</div>
		<script>
			var api_root = '';
		</script>
		<script src="<?=$assets->location?>/admin_assets/<?=$manifest['js/app.js']?>"></script>
	</body>
</html>