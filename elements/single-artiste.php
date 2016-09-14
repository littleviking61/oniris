<?php if (!empty(get_field('nom'))): ?>

	<div class="item min-2 flex-2 artiste <?php the_field('category') ?>">
		<a href="<?php the_permalink() ?>" class="container contain post-it <?php the_field('category') ?>">
			<?php if( has_post_thumbnail() ): ?>
				<div class="thumbnail">
					<?php the_post_thumbnail('small') ?>
				</div>
			<?php endif ?>
			<div class="detail">
				<h3><?= get_field('prenom') . ' ' . get_field('nom') ?></h3>
				<div class="content">
					<p><?= do_shortcode(get_field('courte_biographie')) ?></p>
				</div>
			</div>
		</a>
	</div>

<?php endif ?>