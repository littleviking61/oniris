<?php if (!empty(get_field('nom'))): ?>
	
	<a href="<?php the_permalink() ?>" class="container flex-2 post-it artiste <?php the_field('category') ?>">
		<?php if( get_field('thumbnail') ): ?>
			<div class="thumbnail">
				<img src="<?= get_field('thumbnail') ?>" alt="">
			</div>
		<?php endif ?>
		<div class="detail">
			<h3><?= get_field('prenom') . ' ' . get_field('nom') ?></h3>
			<hr>
			<div class="content">
				<?php the_field('courte_biographie') ?>
			</div>
		</div>
	</a>

<?php endif ?>