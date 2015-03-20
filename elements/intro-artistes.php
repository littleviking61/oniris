<h2><?= get_field('prenom') . ' ' . get_field('nom') ?></h2>
<div class="row start">
	<section class="flex-2 intro">
		<div class="container">
			<?php if( has_post_thumbnail() ): ?>
			<div class="thumbnail">
				<?php the_post_thumbnail('small') ?>
			</div>
			<?php endif ?>
			<div class="content">
				<?php do_shortcode(the_field('courte_biographie')) ?>
			</div>
		</div>
	  <?php get_template_file('elements/relation-'.get_field('page_type_acf')); ?>
	</section>