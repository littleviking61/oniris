<?php
require_once('lib/reverie.php');
require_once('lib/bbcode.php');
require_once('lib/favicon.php');

/**********************
Add theme supports
 **********************/

function startup_theme_support() {
		// Add language supports.
		load_theme_textdomain('reverie', get_template_directory() . '/lang');

		add_theme_support('post-thumbnails');
		// add_image_size( 'small', '240', '240', false );

		add_theme_support('menus');
		register_nav_menus(array(
				'primary' => __('Primary Navigation', 'reverie'),
				'secondary' => __('Secondary Navigation', 'reverie'),
				'social' => __('Social Navigation', 'reverie'),
				'footer1' => __('Footer colonne 1', 'reverie'),
				'footer2' => __('Footer colonne 2', 'reverie'),
				'footer3' => __('Footer colonne 3', 'reverie'),
		));
}
add_action('after_setup_theme', 'startup_theme_support'); /* end Reverie theme support */

/**********************
search metabox configurations
 **********************/

function my_acf_result_query_artistes( $args, $field, $post )
{
		$args['post_type'] = 'page';
		$args['post_parent'] = 8;

		return $args;
}
add_filter('acf/fields/relationship/query/name=relation_artistes', 'my_acf_result_query_artistes', 10, 3);

function my_acf_result_query_salons( $args, $field, $post )
{
		// eg from https://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters
		$args['post_type'] = 'page';
		$args['post_parent'] = 1390;

		return $args;
}
add_filter('acf/fields/relationship/query/name=relation_salons', 'my_acf_result_query_salons', 10, 3);

/**********************
Menu
 **********************/

function add_search_form($items, $args) {
	if( $args->theme_location == 'primary' )
		$items .=  '<li class="my-nav-menu-search"><a href="#search"><i class="fa fa-search"></i></a></li>';
	return $items;
}
add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);

function SearchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'page');
	}
	return $query;
}

add_filter('pre_get_posts','SearchFilter');

add_action( 'walker_nav_menu_start_el', 'empty_nav_links_to_span', 10, 4 );
function empty_nav_links_to_span( $item_output, $item, $depth, $args ) {
	$ancre = parse_url($item->url)["fragment"];

	if ( !is_null($ancre) ) {
		if($ancre === 'actuellement') {
			$date = date('Ymd');
			$args = [
				'posts_per_page' => 1,
				'post_type' => 'page',
				'meta_query' => [
					'relation' => 'AND',
					[
						'key' => 'a_la_galerie',
						'value' => '1',
						'compare' => '='
					],
					[
						'key' => 'date_de_debut',
						'value' => $date,
		        'compare' => '<=',
		        'type' => 'DATE'
					],
					[
						'key' => 'date_de_fin',
						'value' => $date,
		        'compare' => '>=',
		        'type' => 'DATE'
					],
					[
						'key' => 'page_type_acf',
						'value' => 'expositions',
						'compare' => '='
					]
				]
			];
			$the_query = new WP_Query( $args );

			if( $the_query->have_posts() ): while ( $the_query->have_posts() ) :  $the_query->the_post();
					$lurl = get_permalink();
			endwhile; endif;

			if(!isset($lurl)) $item_output = '';
			else $item_output = preg_replace( '/<a.*="?(.*)">/', "<a href='$lurl'>", $item_output );

			wp_reset_query();

		}elseif($ancre === 'discover') {
			$args = [
				'posts_per_page' => 1,
				'orderby' => 'rand',
				'post_type' => 'page',
				'meta_query' => [
					'relation' => 'AND',
					[
						'key' => 'visible',
						'value' => 'true',
						'compare' => '='
					],
					[
						'key' => 'page_type_acf',
						'value' => 'artistes',
						'compare' => '='
					]
				]
			];
			$the_query = new WP_Query( $args );

			if( $the_query->have_posts() ): while ( $the_query->have_posts() ) :  $the_query->the_post();
					$lurl = get_permalink();
			endwhile; endif;
			
			if(!isset($lurl)) $item_output = '';
			else $item_output = preg_replace( '/<a.*="?(.*)">/', "<a href='$lurl'>", $item_output );

			wp_reset_query();
		}
	}
	return $item_output;
}

/**********************
Body class
 **********************/

// add category nicenames in body class
function add_body_class($classes) {
	global $post;
	// foreach((get_the_category($post->ID)) as $category)
	$classes[] = 'page-'.$post->post_name;
	$classes[] = 'type-'.get_field('page_type_acf');
	$classes[] = get_field('category');
	return $classes;
}
add_filter('body_class', 'add_body_class');

/**********************
Navigation
 **********************/

function the_nav_section($pageId, $args = [], $class = 'nav-section')
{
	$argsDefault = array(
		'post_parent'    => $pageId,
		'orderby'        => 'date',
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'asTitle'				 => false
	);

	$args = array_merge($argsDefault, $args);
	$currentId = get_the_ID();
	$childPage = get_posts( $args ); 
	?>
	<section class="nav-section">
		<ul class="sub-menu <?= $class ?>">
			<?php foreach ( $childPage as $post ) : setup_postdata( $post ); ?>

				<?php if (get_field('visible', $post->ID) == 'true'): ?>
					<li class="<?= $post->ID == $currentId ? 'current-menu-item' : null ?><?= ''//get_field('category', $post->ID) ?>">
						<?php 
							$text = isset($result)
								? get_field($result, $post->ID)
								: $post->post_title; ?>
						<a href="<?= get_permalink($post->ID) ?>" title="<?= $text ?>">
							<?= apply_filters('the_title', $text) ?>
						</a>
					</li>
				<?php endif ?>
			
			<?php endforeach ?>
		</ul>
	</section>
	<?php wp_reset_postdata();
}

function get_template_file($template, $default = null) {
	$template = locate_template($template . '.php');
  if(file_exists($template)) {
    require($template);
  	return true;
  }elseif( !is_null($default) ){
    require($default . '.php');
  	return true;
  }
}

/* ajax call funtion */

function bimLa_gallery($id) {
	$galleryId =  (int) $_GET['galleryId'] ?: (int) $_POST['galleryId'];
	$gallery = $_GET['gallery'] ?: $_POST['gallery'];
	$index = (int) $_GET['index'] ?: (int) $_POST['index'];

	$template = locate_template( 'ajax-gallery.php' );
  if(file_exists($template)) {
    include($template);
  }

  // get_template_part( 'single', 'gallery' );

	die();
}
// creating Ajax call for WordPress
add_action( 'wp_ajax_nopriv_get_gallery', 'bimLa_gallery' );
add_action( 'wp_ajax_get_gallery', 'bimLa_gallery' );

// to fix space probleme with NG space image...
add_filter('ngg_get_image_url', 'ngg_replace_plus_with_percenttwenty', 10, 3);
function ngg_replace_plus_with_percenttwenty($url, $image, $size) {
    return str_replace('+', '%20', $url);
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
	acf_add_options_sub_page('Informations pratiques');
	acf_add_options_sub_page('Newsletter');
	acf_add_options_sub_page('Medias sociaux');
	
}

/* disable wordpress notification */
add_action('after_setup_theme','remove_core_updates');
function remove_core_updates()
{
 if(! current_user_can('update_core')){return;}
 add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
 add_filter('pre_option_update_core','__return_null');
 add_filter('pre_site_transient_update_core','__return_null');
}

function wpb_related_pages() { 
	$orig_post = $post;
	global $post;
	$tags = wp_get_post_tags($post->ID);
	
	if ($tags) {
		$tag_ids = array();
		foreach($tags as $individual_tag) :

			$tag_ids[] = $individual_tag->term_id;
			$args = array(
				'post_type' => 'page',
				// 'tag__in' => $tag_ids,
				// 'post__not_in' => array($post->ID),
				'posts_per_page'=>5
				);
			$my_query = new WP_Query( $args );
			if( $my_query->have_posts() ) {
				echo '<div id="relatedpages"><h3>Related Pages</h3><ul>';
				while( $my_query->have_posts() ) { ?>
					<li>
						<h3><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					</li>
				<?php };
			echo '</ul></div>';
			} else { 
			echo "No Related Pages Found:";
			}
			$post = $orig_post;
		endforeach;
		wp_reset_query(); 
	}
}

function filter_plugin_updates( $value ) {
    unset( $value->response['advanced-custom-fields-pro/acf.php'] );
    unset( $value->response['qtranslate-x/qtranslate.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

?>