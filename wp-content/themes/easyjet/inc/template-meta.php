<?php
/**
 * Post Meta Template Functions.
 *
 * @package Easyjet
 */

/**
 * Print HTML with a share buttons.
 *
 * @since  1.0.0
 * @return array
 */
function easyjet_share_buttons( $context = 'loop', $args = array(), $config = array() ) {

	if ( 'loop' == $context ) {
		$meta = 'blog_post_share_buttons';
	} else {
		$meta = 'single_post_share_buttons';
	}

	if ( ! easyjet_is_meta_visible( $meta, $context ) ) {
		return;
	}

	/**
	 * Default social networks.
	 *
	 * @since 1.0.0
	 *
	 * $1%s - `id`
	 * $2%s - `type`
	 * $3%s - `url`
	 * $4%s - `title`
	 * $5%s - `summary`
	 * $6%s - `thumbnail`
	 */

	$defaults = apply_filters( 'easyjet_default_args_share_buttons', array(
		'facebook' => array(
			'icon'      => 'nc-icon-mini social_logo-fb-simple',
			'name'      => esc_html__( 'Facebook', 'easyjet' ),
			'share_url' => 'https://www.facebook.com/sharer/sharer.php?u=%3$s&t=%4$s',
		),
		'twitter' => array(
			'icon'      => 'nc-icon-mini social_logo-twitter',
			'name'      => esc_html__( 'Twitter', 'easyjet' ),
			'share_url' => 'https://twitter.com/intent/tweet?url=%3$s&text=%4$s',
		),
		'google-plus' => array(
			'icon'      => 'nc-icon-mini social_logo-google-plus',
			'name'      => esc_html__( 'Google+', 'easyjet' ),
			'share_url' => 'https://plus.google.com/share?url=%3$s',
		),
	) );

	$networks = wp_parse_args( $args, $defaults );

	$default_config = apply_filters( 'easyjet_default_config_share_buttons', array(
		'http'         => is_ssl() ? 'https' : 'http',
		'custom_class' => '',
	) );

	$config = wp_parse_args( $config, $default_config );

	// Prepare a data for sharing.
	$id           = get_the_ID();
	$type         = get_post_type( $id );
	$url          = get_permalink( $id );
	$title        = get_the_title( $id );
	$summary      = get_the_excerpt();
	$thumbnail_id = get_post_thumbnail_id( $id );
	$thumbnail    = '';

	if ( ! empty( $thumbnail_id ) ) {
		$thumbnail = wp_get_attachment_image_src( $thumbnail_id, 'full' );
		$thumbnail = $thumbnail[0];
	}

	$share_item_html = apply_filters( 'easyjet_share_button_html',
		'<div class="share-btns__item %2$s-item"><a class="share-btns__link" href="%1$s" target="_blank" rel="nofollow" title="%3$s"><i class="%4$s"></i><span class="share-btns__label screen-reader-text">%5$s</span></a></div>'
	);
	$share_buttons = '';

	foreach ( (array) $networks as $id => $network ) :

		if ( empty( $network['share_url'] ) ) {
			continue;
		}

		$share_url = sprintf( $network['share_url'],
			urlencode( $id ),
			urlencode( $type ),
			urlencode( $url ),
			urlencode( $title ),
			urlencode( $summary ),
			urlencode( $thumbnail )
		);

		$share_buttons .= sprintf(
			$share_item_html,
			htmlentities( $share_url ),
			sanitize_html_class( $id ),
			esc_html__( 'Share on ', 'easyjet' ) . $network['name'],
			esc_attr( $network['icon'] ),
			esc_attr( $network['name'] )
		);

	endforeach;

	printf(
		'<div class="share-btns__list %1$s"><div class="share-btns__items">%2$s</div></div>',
		esc_attr( $config['custom_class'] ),
		$share_buttons
	);
}

/**
 * Get HTML with a share buttons to single post.
 *
 * @return string
 */
function easyjet_get_single_share_buttons() {
	ob_start();
	easyjet_share_buttons( 'single' );
	$share_btn = ob_get_contents();
	ob_end_clean();

	return $share_btn;
}
