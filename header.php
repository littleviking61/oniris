<!doctype html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="shortcut icon" type="image/png" href="<?= get_template_directory_uri(); ?>/favicon.ico"> -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
	<!-- <link href="https://fontastic.s3.amazonaws.com/gRRNm22qUWbaxCi8Cgm6KF/icons.css" rel="stylesheet"> -->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header class="main" role="banner">
		<!-- Starting the nav -->
		<div class="header-info">
			<div class="header-content">
				<?php wp_nav_menu( array( 
					'container' => false,
					'menu_class' => 'header-social',
					'theme_location' => 'social' )
				); ?>

				<div class="infos">
					<?php the_field('contenu_du_header', 'option'); ?>
				</div>
			</div>
		</div>
        
		<div class="header-content header-banner">
			<div class="banner">
				<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
					<?php include(locate_template('icon.php')) ?>
					<span class="hide"><?php bloginfo('name'); ?></span></a>
				</h1>
				<!-- <div class="switch-lang">
					<a href="#" class="fr active">FR</a> / <a href="#" class="en">EN</a>
				</div> -->
			</div>

			<?php wp_nav_menu( array( 
				'container' => 'nav',
				'container_class' => 'main hide-for-small',
				'theme_location' => 'primary' )); 
			?>

			<span class="show-for-medium show-menu" data-show="#aside"><?= __('Navigation rapide') ?></span>

		</div>
		<!-- End of Top-Bar -->
	</header>

	<main role="document">

		<?php //get_template_part( 'aside' ); ?>