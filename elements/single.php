<?php if (!empty(get_field('nom'))): ?>

	<a href="<?php the_permalink() ?>" class="container flex-2 post-it <?php the_field('category') ?>">
		<?php if( get_field('thumbnail') ): ?>
			<div class="thumbnail">
				<img src="<?= get_field('thumbnail') ?>" alt="">
			</div>
		<?php endif ?>
		<div class="detail">
			<h3><?= get_field('name') ?></h3>
			<?php if( get_field('courte_biographie') ): ?>
				<hr>
				<div class="content">
					<p><?= do_shortcode(get_field('courte_biographie')) ?></p>
				</div>
			<?php endif ?>
		</div>
	</a>

<?php endif ?>