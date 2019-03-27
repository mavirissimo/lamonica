<?php
/**
 * Template part for displaying post categories.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Easyjet
 */

$utility = easyjet_utility()->utility;

if ( 'post' === get_post_type() ) :

	$cats_visible = ( is_single() ) ? easyjet_is_meta_visible( 'single_post_categories', 'single' ) : easyjet_is_meta_visible( 'blog_post_categories', 'loop' );

	$utility->meta_data->get_terms( array(
		'visible'   => $cats_visible,
		'type'      => 'category',
		'delimiter' => ', ',
		'prefix'    => esc_html( 'in ', 'easyjet' ),
		'before'    => '<span class="post__cats">',
		'after'     => '</span>',
		'echo'      => true,
	) );

endif;
