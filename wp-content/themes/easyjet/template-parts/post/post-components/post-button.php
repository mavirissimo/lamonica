<?php
/**
 * Template part for displaying post read more button.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Easyjet
 */

$utility     = easyjet_utility()->utility;
$btn_visible = get_theme_mod( 'blog_read_more_btn', easyjet_theme()->customizer->get_default( 'blog_read_more_btn' ) );
$btn_text    = get_theme_mod( 'blog_read_more_text', easyjet_theme()->customizer->get_default( 'blog_read_more_text' ) );

$utility->attributes->get_button( array(
	'visible' => $btn_visible,
	'class'   => 'post__button btn btn-accent-1',
	'text'    => $btn_text,
	'html'    => '<div class="post__button-wrap"><a href="%1$s" %3$s>%4$s%5$s<i class="fa fa-angle-right" aria-hidden="true"></i></a></div>',
	'echo'    => true,
) );
