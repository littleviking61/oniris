<?php 
	$width = get_field('largeur_du_bloc');
	$flex = $width > 0 ? 'flex-' . $width : 'flex-3';
?>

<h2><?= get_field('prenom') . ' ' . get_field('nom') ?></h2>

<section class="intro <?= $flex ?>">
	<div class="contain">
		<div class="container">
			<?php if( has_post_thumbnail() ): ?>
				<div class="thumbnail">
					<?php the_post_thumbnail('medium') ?>
				</div>
			<?php endif ?>
			<div class="content">
				<?= do_shortcode(get_field('courte_biographie')) ?>
			</div>
		</div>
	  <div class="relation-artiste">
	  	<?php get_template_file('elements/relation-'.get_field('page_type_acf')); ?>
	  </div>
	</div>
</section>