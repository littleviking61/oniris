<?php 
	$width = get_sub_field('largeur_du_bloc');
	$flex = $width > 0 ? 'flex-' . $width : 'flex-3';
	$links = get_sub_field('links');
?>

<section class="links <?= $flex ?>">

	<div class="contain">
		<?php if( get_sub_field('titre_de_la_section') ): ?>
			<h3><?= do_shortcode(get_sub_field('titre_de_la_section')) ?></h3>
		<?php endif ?>
		
		<ul class="links-list">
		    <?php foreach ($links as $link): ?>
		    	<li class="link"><a href="<?= $link['link'] ?>"><?= wp_get_attachment_image( $link['image'], 'thumb' ); ?><h4><?= do_shortcode($link['titre']) ?></h4><p><?= do_shortcode($link['description']) ?></p></a></li>		
		    <?php endforeach ?>
		</ul>
	</div>

</section>