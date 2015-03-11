<h2><?= get_field('nom') ?></h2>

<section class="container flex-2 intro">
	<?php if( has_post_thumbnail() ): ?>
		<div class="thumbnail">
			<?php the_post_thumbnail('small') ?>
		</div>
	<?php endif ?>
	<div class="content">
		<?php do_shortcode(the_field('courte_biographie')) ?>
	</p>
</section>