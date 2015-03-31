<?php 
	$width = get_sub_field('largeur_du_bloc');
	$flex = $width > 0 ? 'flex-' . $width : 'flex-2';
	$container = get_sub_field('specifique_bloc_class') === 'no-bg' ? '' : 'container ';
?>

<section class="<?= $container ?><?= $flex ?>">
	<?php if (get_field('artistes_intro_foire')): ?>
		<h4 class="uncolor"><?= do_shortcode(get_field('artistes_intro_foire')) ?></h4>
	<?php endif ?>
	<ul class="artistes">
		<?php foreach ($artistes as $artiste): ?>
			<?php if (get_field('nom', $artiste)): ?>
				<li class="artiste">
					<a href="<?= get_permalink($artiste) ?>"><?= get_field('prenom', $artiste) ?> <?= get_field('nom', $artiste) ?></a>
				</li>
			<?php endif ?>
		<?php endforeach ?>
	</ul>
</section>