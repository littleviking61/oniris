<aside class="aside-artistes">

	<section class="info">
		<?php if( has_post_thumbnail() ): ?>
			<div class="thumbnail">
				<?php the_post_thumbnail('medium') ?>
			</div>
		<?php endif ?>
		<h2><?= get_field('prenom') . ' ' . get_field('nom') ?></h2>
		<div class="bio"><?= do_shortcode(get_field('courte_biographie')) ?></div>
	</section>

	<ul class="nav-section">
		<li iclass="menu-item">
			
		</li>
		<li iclass="menu-item">
			<a href="http://oniris.nuagegraphik.com/actualites/"><span>Biographie</span></a>
		</li>
		<li iclass="menu-item">
			<a href="http://oniris.nuagegraphik.com/actualites/"><span>Sélection d'oeuvres</span></a>
		</li>
		<li iclass="menu-item">
			<a href="http://oniris.nuagegraphik.com/actualites/"><span>Télécharger la présentation</span></a>
		</li>
		<li iclass="menu-item">
			<a href="http://oniris.nuagegraphik.com/actualites/"><span>Actualités</span></a>
		</li>
	</ul>

</aside>