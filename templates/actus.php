<?php $width = get_sub_field('largeur_du_bloc'); ?>

<section class="actus <?= $width > 0 ? 'flex-' . $width : 'full' ?>">
	<?php $title = get_sub_field('titre'); ?>

	<?php if (!empty($title)): ?>
		<header>
			<h2 class="title full"><?= $title ?></h2>
		</header>
	<?php endif ?>

	<div class="actualities">
		<p>todo placer les articles en relations</p>
	</div>
</section>