<?php 
	$artistes = get_field('relation_artistes');

?>

<div class="row"><h2 class="flex-3"><?= get_field('nom') ?></h2></div>
<div class="row start">
	<section class="flex-3 intro expo">

		<?php if (count($artistes) > 1): ?>
			<hr>
			<?php if (get_field('intitule')): ?>
				<h4 class="intitule"><?php do_shortcode(the_field('intitule')) ?></h4>
				<hr>
			<?php endif ?>

			<?php if (get_field('sous_titre')): ?>
				<h4 class="uncolor"><?= do_shortcode(get_field('sous_titre')) ?></h4>
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

		<?php else: ?>

			<?php foreach ($artistes as $artiste): ?>
				<h3><a href="<?= get_permalink($artiste) ?>"><?= get_field('prenom', $artiste) ?> <?= get_field('nom', $artiste) ?></a></h3>
				
				<hr>
				<?php if (get_field('intitule')): ?>
					<h4 class="intitule"><?php do_shortcode(the_field('intitule')) ?></h4>
					<hr>
				<?php endif ?>

				<div class="detail">
					<div class="thumbnail">
					<?php if (has_post_thumbnail()): ?>
						<?php the_post_thumbnail('thumbnail'); ?>
					<?php else : ?>
						<?= get_the_post_thumbnail($artiste, 'thumbnail') ?>
					<?php endif ?>
					</div>
					<?php if (get_field('sous_titre')): ?>
						<h5><?= do_shortcode(get_field('sous_titre')) ?></h5>
					<?php endif ?>
				</div>
			<?php endforeach ?>		

		<?php endif ?>

	</section>