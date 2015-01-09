<?php
/*
Author: Zhen Huang
URL: http://themefortress.com/

This place is much cleaner. Put your theme specific codes here,
anything else you may wan to use plugins to keep things tidy.

*/

/*
1. lib/clean.php
  - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here

if(!function_exists('init_css_sass')) :
    function init_css_sass(){
        /*
        2. lib/enqueue-sass.php or enqueue-css.php
            - enqueueing scripts & styles for Sass OR CSS
            - please use either Sass OR CSS, having two enabled will ruin your weekend
        */
        require_once('lib/enqueue-sass.php'); // do all the cleaning and enqueue if you Sass to customize Reverie
        //require_once('lib/enqueue-css.php'); // to use CSS for customization, uncomment this line and comment the above Sass line
    }
endif;

init_css_sass();

/*
3. lib/foundation.php
	- add pagination
*/
// require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/nav.php
	- custom walker for top-bar and related
*/
require_once('lib/nav.php'); // filter default wordpress menu classes and clean wp_nav_menu markup
/*
5. lib/presstrends.php
    - add PressTrends, tracks how many people are using Reverie
*/
//require_once('lib/presstrends.php'); // load PressTrends to track the usage of Reverie across the web, comment this line if you don't want to be tracked

/**********************
Add theme supports
 **********************/
function reverie_theme_support() {
    // Add language supports.
    load_theme_textdomain('reverie', get_template_directory() . '/lang');

    // Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
    add_theme_support('post-thumbnails');
    // set_post_thumbnail_size(150, 150, false);

    // rss thingy
    //add_theme_support('automatic-feed-links');

    // Add post formarts supports. http://codex.wordpress.org/Post_Formats
    //add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

    // Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
    add_theme_support('menus');
    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'reverie'),
        'utility' => __('Utility Navigation', 'reverie')
    ));

    // Add custom background support
    // add_theme_support( 'custom-background',
    //     array(
    //         'default-image' => '',  // background image default
    //         'default-color' => '', // background color default (dont add the #)
    //         'wp-head-callback' => '_custom_background_cb',
    //         'admin-head-callback' => '',
    //         'admin-preview-callback' => ''
    //     )
    // );
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
        'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
        'after_widget' => '</div></article>',
        'before_title' => '<h6><strong>',
        'after_title' => '</strong></h6>'
    ));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
        'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h6><strong>',
        'after_title' => '</strong></h6>'
    ));
}

// return entry meta information for posts, used by multiple loops.
if(!function_exists('reverie_entry_meta')) :
    function reverie_entry_meta() {
        echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
        echo '<p class="byline author">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
    }
endif;

// add by nuagegraphik

function custom_edit_post_link($output) {
    $output = str_replace('class="post-edit-link"', 'class="post-edit-link button tiny secondary"', $output);
    return $output;
}
add_filter('edit_post_link', 'custom_edit_post_link');

function get_top_parent_page_id() {
    global $post;
    $ancestors = $post->ancestors;
    if ($ancestors) {
        return end($ancestors);
    } else {
        return $post->ID;
    }
}
// add_action( 'admin_init', 'fixImageMeta' );
/**
* fix broken image metadata so that thumbs can be regenerated
*/
function test(){
    var_dump( wp_get_attachment_url( 13617 ) );
    var_dump( get_attached_file( 13617 ) );
}

function fixImageMeta() {
    global $wpdb;
 
    $sql = "
        select ID from {$wpdb->posts}
        where post_type = 'attachment'
        and post_mime_type like 'image/%'
    ";
    $images = $wpdb->get_col($sql);
    foreach ($images as $id) {
       
        $meta = wp_get_attachment_metadata($id);
            
        echo '<pre>';
        var_dump(get_attached_file($id));
        echo '</pre>';

        if (!$meta["file"]) {
            $file = wp_get_attachment_url($id);

            if (!empty($file)) {
                $info = getimagesize("$file");

                if (!empty($info)) {
                    $meta = array (
                        'width' => $info[0],
                        'height' => $info[1],
                        'hwstring_small' => "height='{$info[1]}' width='{$info[0]}'",
                        'file' => str_replace('http://oniris.nuagegraphik.fr/wp-content/uploads/', '', $file),
                        'sizes' => array(),         // thumbnails etc.
                        'image_meta' => array(),    // EXIF data
                    );
                    echo '<pre>';
                    var_dump($meta);
                    echo '</pre>';
                   // update_post_meta($id, '_wp_attachment_metadata', $meta);
                }
            }
        }
    }
}

function my_acf_result_query_artistes( $args, $field, $post )
{
    // eg from https://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters
   // args
    $args['post_type'] = 'page';
    $args['post_parent'] = 8;

    return $args;
}

function my_acf_result_query_salons( $args, $field, $post )
{
    // eg from https://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters
   // args
    $args['post_type'] = 'page';
    $args['post_parent'] = 1390;

    return $args;
}

// acf/fields/relationship/result - filter for every field
add_filter('acf/fields/relationship/query/name=relation_artistes', 'my_acf_result_query_artistes', 10, 3);
add_filter('acf/fields/relationship/query/name=relation_salons', 'my_acf_result_query_salons', 10, 3);

// search box on menu
add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);

function add_search_form($items, $args) {
if( $args->theme_location == 'primary' )
        $items .=  file_get_contents(locate_template('search-home.php'));
        return $items;
}

// font on menu
function menu( $nav ){
    $menu_item = preg_replace_callback(
        '/(<li[^>]+class=")([^"]+)("?[^>]+>[^>]+>)([^<]+)<\/a>/',
        'replace',
        $nav
    );
    return $menu_item;
}
    
function replace( $a ){
    $start = $a[ 1 ];
    $classes = $a[ 2 ];
    $rest = $a[ 3 ];
    $text = $a[ 4 ];
    $before = true;
    
    $class_array = explode( ' ', $classes );
    $icon_class = array();
    foreach( $class_array as $key => $val ){
        if( 'icon' == substr( $val, 0, 4 ) ){
            if( 'icon' == $val ){
                unset( $class_array[ $key ] );
            } elseif( 'icon-after' == $val ){
                $before = false;
                unset( $class_array[ $key ] );
            } else {
                $icon_class[] = $val;
                unset( $class_array[ $key ] );
            }
        }
    }
    
    if( !empty( $icon_class ) ){
        $icon_class[] = 'icon';
        //$settings = get_option( 'n9m-font-awesome-4-menus', $this->defaults );
        if( $before ){
            $newtext = '<i class="'.implode( ' ', $icon_class ).'"></i><span>'.$text.'</span>';
        } else {
            $newtext = '<span>'.$text.'</span><i class="'.implode( ' ', $icon_class ).'"></i>';
        }
    } else {
        $newtext = $text;
    }
    
    $item = $start.implode( ' ', $class_array ).$rest.$newtext.'</a>';
    return $item;
}
add_filter( 'wp_nav_menu' , 'menu', 10, 2 );

?>