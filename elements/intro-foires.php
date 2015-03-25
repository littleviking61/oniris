<?php 
	$artistes = get_field('relation_artistes');
	$dateformatstring = "d F";
?>

<div class="row start foire">

	<?php if (has_post_thumbnail()): ?>
		<div class="grow cover">
			<?php the_post_thumbnail('thumbnail'); ?>
		</div>
	<?php endif ?>

	<section class="intro grow flex-2">
		<h2 class=""><?= get_field('nom') ?></h2>
		<h3 class=""><?= get_field('lieu') ?></h3>
		<hr>

		<?php if (get_field('intitule')): ?>
			<h4 class="intitule"><?= do_shortcode(get_field('intitule')) ?></h4>
			<hr>
		<?php else: ?>
			<h4>
				du <?= date_i18n($dateformatstring, strtotime(get_field('date_de_debut'))) ?><br>
				au <?= date_i18n($dateformatstring, strtotime(get_field('date_de_fin'))) ?>
			</h4>
			<hr>
		<?php endif ?>
		
		<?php if (get_field('stand')): ?>
			<p class="stand"><?= do_shortcode(get_field('stand')) ?></p>
		<?php endif ?>

	</section>
	<section class="grow">
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