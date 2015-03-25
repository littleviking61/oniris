<?php

// Colored shortcode
function shortcode_color( $atts, $content = NULL ) {
	if ( is_null($content) ) return '';

	return '<span class="colored">' . do_shortcode( $content ) . '</span>';
}


// Bold shortcode
function shortcode_bold( $atts, $content = NULL ) {
	if ( is_null($content) ) return '';

	return '<strong>' . do_shortcode( $content ) . '</strong>';
}

// Bold colored shortcode
function shortcode_bold_color( $atts, $content = NULL ) {
	if ( is_null($content) ) return '';

	return '<strong class="colored">' . do_shortcode( $content ) . '</strong>';
}

// Delete shortcode
function shortcode_del( $atts, $content = NULL ) {
	if ( is_null($content) ) return '';
	return '<del>' . do_shortcode( $content ) . '</del>';
}

// Code shortcode
function shortcode_code( $atts, $content = NULL ) {
	if ( is_null($content) ) return '';
	return '<code>' . do_shortcode( $content ) . '</code>';
}

// Italics shortcode
function shortcode_italics( $atts, $content = NULL ) {
	if ( is_null($content) ) return '';
	return '<em>' . do_shortcode( $content ) . '</em>';
}

// Italics shortcode
function shortcode_underline( $atts, $content = NULL ) {
	if ( is_null($content) ) return '';
	return '<u>' . do_shortcode( $content ) . '</u>';
}

// Blockquote shortcode
function shortcode_quote( $atts, $content = NULL ) {
	if ( is_null($content) ) return '';
	return '<blockquote>' . do_shortcode( $content ) . '</blockquote>';
}

// Textarea shortcode
function shortcode_textarea( $atts, $content = NULL ) {
	if ( is_null($content) ) return '';
	return '<textarea>' . do_shortcode( $content ) . '</textarea>';
}

// Note shortcode
function shortcode_note( $atts, $content = NULL ) {
	if ( is_null($content) ) return '';

	return '<!-- ' . do_shortcode( $content ) . ' -->';
}

// Register the shortcodes
add_shortcode( 'c' , 'shortcode_color' );
add_shortcode( 'b' , 'shortcode_bold' );
add_shortcode( 'bc' , 'shortcode_bold_color' );
add_shortcode( 'i' , 'shortcode_italics' );
add_shortcode( 'u' , 'shortcode_underline' );
add_shortcode( 'del' , 'shortcode_del' );
add_shortcode( 'code' , 'shortcode_code' );
add_shortcode( 'quote' , 'shortcode_quote' );
add_shortcode( 'textarea' , 'shortcode_textarea' );
add_shortcode( 'note' , 'shortcode_note' );
