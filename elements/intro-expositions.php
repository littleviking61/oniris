<?php 
	$artistes = get_field('relation_artistes');

?>

<div class="row"><h2 class="flex-3"><?= get_field('nom') ?></h2></div>
<section class="flex-3 intro expo">
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
				<li><a href="<?= get_permalink($artiste) ?>"><?= get_field('prenom', $artiste) ?> <?= get_field('nom', $artiste) ?></a></li>
			<?php endif ?>
			
		<?php endforeach ?>
	</ul>
</section>