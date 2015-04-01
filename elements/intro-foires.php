<?php 
	$artistes = get_field('relation_artistes');
?>

<div class="row start">

	<?php if (has_post_thumbnail()): ?>
		<div class="grow max-2 cover">
			<?php the_post_thumbnail('small'); ?>
		</div>
	<?php endif ?>

	<section class="intro flex-3">
		<h2 class=""><?= get_field('nom') ?></h2>
		<h3 class=""><?= get_field('lieu') ?></h3>
		<hr>

		<?php if (get_field('intitule')): ?>
			<h4 class="intitule"><?php do_shortcode(the_field('intitule')) ?></h4>
			<hr>
		<?php else: ?>
			<h4>
				du <?= date_i18n("d F", strtotime(get_field('date_de_debut'))) ?><br>
				au <?= date_i18n("d F Y", strtotime(get_field('date_de_fin'))) ?>
			</h4>
			<hr>
		<?php endif ?>

		<?php if (get_field('infos_pratiques')): ?>
			<?= do_shortcode(get_field('infos_pratiques')) ?>
		<?php endif ?>
	</section>
</div>