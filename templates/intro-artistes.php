<?php 

?>

<h2><?= get_field('prenom') . ' ' . get_field('nom') ?></h2>

<section class="container flex-2 intro">
	<div class="thumbnail">
		<img src="<?php the_field('thumbnail') ?>" alt="">
	</div>
	<div class="content">
		<?php the_field('courte_biographie') ?>
	</p>
</section>