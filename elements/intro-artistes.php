<h2><?= get_field('prenom') . ' ' . get_field('nom') ?></h2>
<div class="row start">
	<section class="intro flex-2 grow max-4">
		<div class="container flex-2 grow">
			<?php if( has_post_thumbnail() ): ?>
				<div class="thumbnail">
					<?php the_post_thumbnail('small') ?>
				</div>
			<?php endif ?>
			<div class="content">
				<?= do_shortcode(get_field('courte_biographie')) ?>
			</div>
		</div>
	  <div class="flex-2 grow">
	  	<?php get_template_file('elements/relation-'.get_field('page_type_acf')); ?>
	  </div>
	</section>