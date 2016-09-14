<?php 
	$artistes = get_field('relation_artistes');
	$thumbnailSize = get_field('taille_de_limage') ?: 'medium';
?>

<aside class="aside-expositions flex-3">

	<section class="info">
		<h2><?= get_field('nom') ?></h2>
		<div class="contain container">
			<div class="content">
					<?php if( has_post_thumbnail() ): ?>
					<div class="thumbnail">
						<?php the_post_thumbnail('medium') ?>
					</div>
				<?php endif ?>
				<div class="bio">
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

					<?php if (get_field('sous_titre')): ?>
						<h5><?= do_shortcode(get_field('sous_titre')) ?></h5>
					<?php endif ?>
				</div>
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

	<hr>
	<section class="relations">
		<h2><?= count($artistes) > 1 ? __('Artistes présents', 'reverie') : __('Artiste présent', 'reverie') ?></h2>
		<ul class="nav-section">
			<?php foreach ($artistes as $artiste): ?>
				<?php if (get_field('nom', $artiste)): ?>
					<li class="menu-item">
						<a href="<?= get_permalink($artiste) ?>"><?= get_field('prenom', $artiste) ?> <?= get_field('nom', $artiste) ?></a>
					</li>
				<?php endif ?>
			<?php endforeach ?>
		</ul>
	</section>

	<?php if (count($artistes) === 1 && get_field('afficher_les_actualites')): ?>
  	<?php get_template_file('elements/relation-artistes'); ?>
  <?php endif ?>
</aside>