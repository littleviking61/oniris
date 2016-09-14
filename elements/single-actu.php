<?php 
	$flex = 'min-2 flex-3'; 
	$linkID =  get_field('lien')[0] || get_field('lien_externe');
	$specific = get_field('specific_details');
	$when = get_field('when');
	$actualDate = date('Ymd');

	if($specific === true) {
		$categorie = get_field('category');
		$place = get_field('a_la_galerie');
	}else{
		$categorie = get_field('category', $linkID);
		$relations = get_field('type', $linkID);
		$place = get_field('a_la_galerie', $linkID);
	}
?>

<?php if( get_field('titre') ): ?>
<div class="item <?= $flex ?> actu single <?= $categorie ?>"
		data-date="<?= is_null($when) ? 'gone' : $when ?>"
		data-type="<?= $relations === "groupe" ? 'group' : 'alone' ?>"
		data-place="<?= $place || is_null($place) ? 'in' :  'out' ?>">
		<a href="<?= get_permalink($linkID) ?>" class="highlight container contain <?= $categorie ?>">
		
		<?php if( has_post_thumbnail() ): ?>		
			<div class="thumbnail">
				<?php the_post_thumbnail('small') ?>
			</div>
		<?php endif ?>

		<?php if( get_field('intitule') ): ?>
			<h5><?= get_field('intitule') ?></h5>
		<?php endif ?>
		<h2><?= get_field('titre') ?></h2>
		<?php if( get_field('sous_titre') ): ?>
			<h3><?= get_field('sous_titre') ?></h3>
		<?php endif ?>
		<?php if( get_field('resume') ): ?>
			<hr>
			<div class="content">
				<p><?= get_field('resume') ?></p>
			</div>
		<?php endif ?>
	</a>
</div>
<?php endif ?>