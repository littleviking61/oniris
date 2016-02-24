<?php 
	$width = get_sub_field('largeur_du_bloc');
	$flexClass = $width > 0 ? 'flex-' . $width : '';
?>
<section class="newsletter" <?= $flexClass ?>>
	<div class="contain container special text-<?= get_sub_field('alignement')[0] ?>">
		<?php if (get_sub_field('titre')): ?>
			<h4><?= do_shortcode(get_sub_field('titre')) ?></h4>
		<?php endif ?>
		<div class="content has-button">
			<?php if (get_sub_field('contenu')): ?>
				<?= do_shortcode(get_sub_field('contenu')) ?>
			<?php endif ?>
			<?php if (get_sub_field('activer_le_contenu_par_defaut')): ?>
				<hr>
				<?php the_field('contenu_newsletter', 'option'); ?>
			<?php endif ?>
		</div>
	</div>
</section>