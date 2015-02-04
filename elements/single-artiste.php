<?php if (!empty(get_field('nom'))): ?>
	<?php 
		$thumbnail = get_field('thumbnail');
	?>
	<a href="<?php the_permalink() ?>" class="container flex-2 post-it artiste <?php the_field('category') ?>">
		<?php if( has_post_thumbnail() ): ?>
			<div class="thumbnail">
				<?php the_post_thumbnail('small') ?>
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