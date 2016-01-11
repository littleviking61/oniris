<section class="infos-pratiques">
	<div class="contain container">
		<div class="content has-button">
			<?php the_field('contenu_infos', 'option'); ?>
			<a class="button right" href="<?php the_field('page_en_lien', 'option') ?>"><?php the_field('icone_du_lien', 'option') ?> <?php the_field('texte_du_lien', 'option') ?></a>
		</div>
	</div>
</section>