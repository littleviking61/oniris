<?php 
// add a favicon to your
function blog_favicon() {
	$category = get_field('category', get_the_ID());  ?>

	<?php if (!empty($category)) : ?>
		<link rel="apple-touch-icon <?= $category ?>" sizes="57x57" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/favicon-194x194.png" sizes="194x194">
		<link rel="icon" type="image/png" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/manifest.json">
		<meta name="msapplication-TileColor" content="#2d89ef">
		<meta name="msapplication-TileImage" content="<?= get_bloginfo('template_directory') ?>/icons/favicon/<?= $category ?>/mstile-144x144.png">
		<meta name="theme-color" content="#ffffff">
	<?php else : ?>
		<link rel="apple-touch-icon <?= $category ?>" sizes="57x57" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/favicon-194x194.png" sizes="194x194">
		<link rel="icon" type="image/png" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?= get_bloginfo('template_directory') ?>/icons/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#2d89ef">
		<meta name="msapplication-TileImage" content="/icons/favicon/mstile-144x144.png">
		<meta name="theme-color" content="#ffffff">
	<?php endif ?>
	<?php
}
add_action('wp_head', 'blog_favicon');