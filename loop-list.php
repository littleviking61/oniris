<?php 
	$list = get_field('liste'); 
	$isotop = get_field('isotop');
?>

<header>
	<h2><?= do_shortcode(get_field('titre_alternatif')) ?: get_the_title() ?></h2>
</header>

<?php if ( $isotop ): ?>
	<div class="filter-tools">
		<div class="isotop-links" data-filter-group="all">
	    <a href="#all" class="button check" data-filter="*">show all</a>
	  </div>
	  <div class="isotop-links" data-filter-group="cat">
			<a href="#cat" class="button cat-geometrie check" data-filter=".cat-geometrie">geometrie</a>
			<a href="#cat" class="button cat-peinture check" data-filter=".cat-peinture">peinture</a>
			<a href="#cat" class="button cat-photographie check" data-filter=".cat-photographie">photographie</a>
			<a href="#cat" class="button cat-multi check" data-filter=".cat-multi">multi</a>
			<a href="#cat" class="button cat-sculpture check" data-filter=".cat-sculpture">sculpture</a>
		</div>
		<?php if ($list !== 'artiste'): ?>
			<div class="isotop-links" data-filter-group="place">
					<a href="#place" class="button check" data-filter='[data-place="in"]' data-place="in">in</a>
					<a href="#place" class="button check" data-filter='[data-place="out"]' data-place="out">out</a>
			</div>	
			<div class="isotop-links" data-filter-group="type">
					<a href="#place" class="button check" data-filter='[data-type="group"]' data-type="group">group</a>
					<a href="#place" class="button check" data-filter='[data-type="alone"]' data-type="alone">alone</a>
			</div>	
			<div class="isotop-links" data-filter-group="date">
					<a href="#date" class="button check" data-filter='[data-date="upcoming"]' data-date="upcoming">upcoming</a>
					<a href="#date" class="button check" data-filter='[data-date="now"]' data-date="now">now</a>
					<a href="#date" class="button check" data-filter='[data-date="gone"]' data-date="gone">gone</a>
			</div>
		<?php endif ?>
		<input type="text" id="quicksearch" placeholder="Search" />
	</div>
<?php endif ?>

<div class="list-page full<?php if($isotop) echo ' isotop' ?>">
	<?php 
		if($list == 'actu') {
			$args = array(
				'posts_per_page' => -1
			);
		}else{
			$args = array(
				'post_parent'    => url_to_postid(get_field('page_parent')),
				'post_type'      => 'page',
				'meta_key'       => get_field('meta_key'),
				'orderby'        => get_field('type_de_meta'),
				'order'          => 'ASC',
				'posts_per_page' => -1
			);
		}

		$listPosts = get_posts( $args ); 
		$template = 'elements/single-'.get_field('liste') ;

		foreach ( $listPosts as $post ) :	 
			setup_postdata( $post );
			$post->class = 'flex-4';
			get_template_file($template, 'elements/single' );
		
		endforeach; wp_reset_postdata();
	?>
</div>