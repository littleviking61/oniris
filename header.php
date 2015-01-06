<!doctype html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

 	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header class="main" role="banner">
	<!-- Starting the nav -->
	<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
		<img class="logo" src="<?php bloginfo('template_url'); echo '/img/logo.png'?>"/>
		<span><?php bloginfo('name'); ?></span></a>
	</h1>
	<a href="#" class="visible-for-small-only"><i class="fi-list"></i><span>Menu</span></a>
	<nav class="main">
	    <?php wp_nav_menu( array( 'theme_location' => 'primary' )); ?>
	</nav>

	<!-- End of Top-Bar -->

</header>