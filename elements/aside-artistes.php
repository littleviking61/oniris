<aside class="aside-artistes flex-3">

	<section class="info">
		<h2><?= get_field('prenom') . ' ' . get_field('nom') ?></h2>
		<div class="contain container">
			<div class="content">
					<?php if( has_post_thumbnail() ): ?>
					<div class="thumbnail">
						<?php the_post_thumbnail('medium') ?>
					</div>
				<?php endif ?>
				<div class="bio"><?= do_shortcode(get_field('courte_biographie')) ?></div>
			</div>
		</div>
	</section>
	<?php if( have_rows('element_du_menu') ): ?>
		<hr>
		<ul class="nav-section">
	    <?php while ( have_rows('element_du_menu') ) : the_row(); ?>
				<?php
					$link = 
						!empty(get_sub_field('page_ou_article')) ? get_sub_field('page_ou_article') :
						!empty(get_sub_field('fichier')) ? get_sub_field('fichier') 
						: get_sub_field('fichier'); ?>
					<li class="menu-item">
						<?php if (!empty($link)): ?>
							<a href="<?= $link ?>"><?= the_sub_field('icon'); ?> <span><?= the_sub_field('texte'); ?></span></a>
						<?php else: ?>
							<span><?= the_sub_field('icon'); ?> <?= the_sub_field('texte'); ?></span>
						<?php endif ?>
					</li>
			<?php endwhile; ?>
	  </ul>
	<?php endif ?>
  <?php if (get_field('afficher_les_actualites')): ?>
  	<?php get_template_file('elements/relation-artistes'); ?>
  <?php endif ?>
</aside>