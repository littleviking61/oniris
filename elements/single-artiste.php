<?php if (!empty(get_field('nom'))): ?>
	
	<a href="<?php the_permalink() ?>" class="container flex-2 post-it artiste <?php the_field('category') ?>">
		<div class="thumbnail">
			<img src="<?php the_field('thumbnail') ?>" alt="">
		</div>
		<div class="detail">
			<h3><?= get_field('prenom') . ' ' . get_field('nom') ?></h3>
			<hr>
			<div class="content">
				<?php the_field('courte_biographie') ?>
			</div>
		</div>
	</a>

<?php endif ?>