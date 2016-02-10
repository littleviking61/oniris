<?php if (!empty(get_field('nom'))): ?>
	<div class="item fixed-2 salon <?php the_field('category') ?>">
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
				<?php else: ?>
					<h5 class="colored">
						du <?= date_i18n("d F", strtotime(get_field('date_de_debut'))) ?> 
						au <?= date_i18n("d F y", strtotime(get_field('date_de_fin'))) ?>
					</h5>
				<?php endif ?>

			</div>
		</a>
	</div>

<?php endif ?>