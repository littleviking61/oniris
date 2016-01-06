<?php 
	$width = get_field('largeur_du_bloc');
	$flex = $width > 0 ? 'flex-' . $width : 'flex-3';
	$artistes = get_field('relation_artistes');
?>


<?php if (count($artistes) > 1): ?>
	<div class="row">
		<h2>
			<?= get_field('nom') ?>
		</h2>
	</div>
	<div class="row start">
		<section class="intro <?= $flex ?>">
			<div class="contain">
				<hr>

				<?php if (get_field('intitule')): ?>
					<h4><?= do_shortcode(get_field('intitule')) ?></h4>
					<hr>
				<?php else: ?>
					<h4>
						du <?= date_i18n("d F", strtotime(get_field('date_de_debut'))) ?><br>
						au <?= date_i18n("d F y", strtotime(get_field('date_de_fin'))) ?>
					</h4>
					<hr>
				<?php endif ?>

				<div class="detail">
					<?php if (has_post_thumbnail()): ?>
						<div class="thumbnail">
							<?php the_post_thumbnail('thumbnail'); ?>
						</div>
					<?php elseif(has_post_thumbnail($artiste)) : ?>
						<div class="thumbnail">
							<?= get_the_post_thumbnail($artiste, 'thumbnail') ?>
						</div>
					<?php endif ?>

					<?php if (get_field('sous_titre')): ?>
						<h5><?= do_shortcode(get_field('sous_titre')) ?></h5>
					<?php endif ?>
				</div>

				<div class="relations">
					<h5><?= __('Artistes présents') ?></h5>
					<ul class="artistes" style="width: 100%">
						<?php foreach ($artistes as $artiste): ?>
							<?php if (get_field('nom', $artiste)): ?>
								<li class="artiste">
									<a href="<?= get_permalink($artiste) ?>"><?= get_field('prenom', $artiste) ?> <?= get_field('nom', $artiste) ?></a>
								</li>
							<?php endif ?>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</section>

<?php else: ?>

	<?php foreach ($artistes as $artiste): ?>
		<div class="row">
			<h2>
				<a href="<?= get_permalink($artiste) ?>"><?= get_field('prenom', $artiste) ?> <?= get_field('nom', $artiste) ?></a>
			</h2>
		</div>
		<div class="row start">
			<section class="intro <?= $flex ?>">

				<div class="contain">
						<h3><?= get_field('nom') ?></h3>
						<hr>
						<?php if (get_field('intitule')): ?>
							<h4><?= do_shortcode(get_field('intitule')) ?></h4>
							<hr>
						<?php else: ?>
							<h4>
								du <?= date_i18n("d F", strtotime(get_field('date_de_debut'))) ?><br>
								au <?= date_i18n("d F Y", strtotime(get_field('date_de_fin'))) ?>
							</h4>
							<hr>
						<?php endif ?>

						<div class="detail">
							<?php if (has_post_thumbnail()): ?>
								<div class="thumbnail">
									<?php the_post_thumbnail('small'); ?>
								</div>
							<?php elseif(has_post_thumbnail($artiste)) : ?>
								<div class="thumbnail">
									<?= get_the_post_thumbnail($artiste, 'small') ?>
								</div>
							<?php endif ?>
							
							<?php if (get_field('sous_titre')): ?>
								<h5><?= do_shortcode(get_field('sous_titre')) ?></h5>
							<?php endif ?>
						</div>

					<!-- 	<?php get_template_file('elements/relation-artistes'); ?> -->
				</div>
			<?php endforeach ?>		
		</section>

<?php endif ?>

