<!doctype html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

 	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
	<link href="https://fontastic.s3.amazonaws.com/gRRNm22qUWbaxCi8Cgm6KF/icons.css" rel="stylesheet">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header class="main" role="banner">
	<!-- Starting the nav -->
	<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
		<img class="logo" src="<?php bloginfo('template_url'); echo '/img/logo-oniris.svg'?>"/>
		<span class="hide"><?php bloginfo('name'); ?></span></a>
	</h1>
	<nav class="main">
	    <?php wp_nav_menu( array( 'theme_location' => 'primary' )); ?>
	</nav>

	<!-- End of Top-Bar -->
</header>
