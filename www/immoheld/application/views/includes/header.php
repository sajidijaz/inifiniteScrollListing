<!doctype html>
<html lang="en">
<head>
	<?php
	$meta = array(
		array(
			'name' => 'robots',
			'content' => 'no-cache'
		),
		array(
			'name' => 'description',
			'content' => 'My Code Challenge'
		),
		array(
			'name' => 'Content-type',
			'content' => 'text/html; charset=utf-8',
			'type' => 'equiv'
		),
		array(
			'name' => 'viewport',
			'content' => 'width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no'
		)
	);

	echo meta($meta);
	?>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $title ?? "Immoheld - Real Estate"; ?></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php
	echo base_url(); ?>assets/css/style.css"/>
	<script>
		const BASE_URL = "<?php echo base_url(); ?>";
	</script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-header">
	<div class="container">
		<a class="navbar-brand" href="javascript:void(0);">
			<img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Immoheld - Logo">
		</a>
	</div>
</nav>
