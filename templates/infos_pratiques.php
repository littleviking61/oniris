<section class="infos-pratiques">
	<div class="contain container special text-<?= get_sub_field('alignement')[0] ?>">
		<?php if (get_sub_field('titre')): ?>
			<h4><?= do_shortcode(get_sub_field('titre')) ?></h4>
		<?php endif ?>
		<div class="content has-button">
			<?php if (get_sub_field('contenu')): ?>
				<?= do_shortcode(get_sub_field('contenu')) ?>
			<?php endif ?>
			<?php if (get_sub_field('activer_le_contenu_par_defaut')): ?>
				<hr>
				<?php the_field('contenu_infos', 'option'); ?>
			<?php endif ?>
			<a class="button right" href="<?php the_field('page_en_lien', 'option') ?>"><?php the_field('icone_du_lien', 'option') ?> <?php the_field('texte_du_lien', 'option') ?></a>
		</div>
	</div>
</section>