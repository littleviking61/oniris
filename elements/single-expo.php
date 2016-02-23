<?php if (!empty(get_field('nom'))): ?>

	<?php 
	$date = new DateTime(get_field('date_de_debut'));
	$endDate = new DateTime(get_field('date_de_fin'));
	$now = new DateTime(); ?>

	<div class="item fixed-2 expo <?php the_field('category') ?>" 
		data-place="<?= get_field('a_la_galerie') ? 'in' : 'out'; ?>"
		data-type="<?= count(get_field('relation_artistes')) > 1 ? 'group' : 'alone' ?>"
		data-date="<?= $date < $now ? ($endDate < $now ? 'gone' : 'now') : 'upcoming' ?>"> 
		<a href="<?php the_permalink() ?>" class="container contain post-it <?php the_field('category') ?>">

			<?php if( has_post_thumbnail() ): ?>
				<div class="thumbnail">
					<?php the_post_thumbnail('small') ?>
				</div>
			<?php endif ?>

			<div class="detail">
				<h3><?= get_field('nom') ?></h3>

				<?php if (get_field('intitule')): ?>
					<h5 class="colored"><?= do_shortcode(get_field('intitule')) ?></h5>
					<hr>
				<?php else: ?>
					<h5 class="colored">
						du <?= date_i18n("d F", strtotime(get_field('date_de_debut'))) ?> 
						au <?= date_i18n("d F y", strtotime(get_field('date_de_fin'))) ?>
					</h5>
					<hr>
				<?php endif ?>

				<div class="content">
					<?php if (get_field('sous_titre')): ?>
						<p><?= do_shortcode(get_field('sous_titre')) ?></p>
					<?php endif ?>
				</div>
			</div>
		</a>
	</div>

<?php endif ?>