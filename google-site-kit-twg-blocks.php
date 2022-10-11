<?php
/**
 * Plugin Name:       Google Site Kit - TwG Blocks
 * Description:       Blocks for Thank with Google module in Google Site Kit.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Google
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       google-site-kit
 */

add_filter( 'block_categories_all' , function( $categories ) {
	$categories[] = array(
		'slug'  => 'google-site-kit',
		'title' => 'Google Site Kit'
	);

	return $categories;
} );

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_twg_block_block_init() {
	$twg_data = get_option( 'googlesitekit_thank-with-google_settings' );

	if ( ! $twg_data ) {
		return;
	}

	register_block_type( __DIR__ . '/build/thank-with-google' );
	register_block_type( __DIR__ . '/build/supporter-wall' );
}
add_action( 'init', 'create_block_twg_block_block_init' );

function editor_assets() {
	$twg_data = get_option( 'googlesitekit_thank-with-google_settings' );

	if ( ! $twg_data ) {
		return;
	}

	if ( ! wp_script_is( 'google_thankjs', 'registered' ) ) {
		$subscription = array(
			'type'              => 'Blog',
			'isPartOfType'      => array( 'Blog', 'Product' ),
			'isPartOfProductId' => $twg_data['publicationID'] . ':default',
			'postTitle'         => get_the_title(),
			'permalink'         => get_permalink(),
			'pluginVersion'     => '1.85.0',
			'colorTheme'        => $twg_data['colorTheme'],
			'promptSettings'    => array(
				'style' => 'inline',
			),
		);
		$twg_inline_script = sprintf(
			'(self.SWG_BASIC=self.SWG_BASIC||[]).push(function(subscriptions){subscriptions.init(%s);});',
			wp_json_encode( $subscription )
		);

		wp_register_script( 'google_thankjs', 'https://news.google.com/thank/js/v1/thank.js', array(), null, true );
		wp_add_inline_script( 'google_thankjs', $twg_inline_script, 'before' );
		wp_enqueue_script( 'google_thankjs' );
	}
}
add_action( 'enqueue_block_editor_assets', 'editor_assets' );

function front_assets() {
	$twg_data = get_option( 'googlesitekit_thank-with-google_settings' );

	if ( ! $twg_data ) {
		return;
	}

	if ( ! wp_script_is( 'google_thankjs', 'registered' ) ) {
		wp_register_script( 'google_thankjs', 'https://news.google.com/thank/js/v1/thank.js', array(), null, true );
	}

	if ( 
		has_block( 'google-site-kit/thank-with-google' ) &&
		! wp_script_is( 'google_thankjs', 'enqueued' )
	) {
		if ( ! wp_script_is( 'google_thankjs', 'enqueued' ) ) {
			$subscription = array(
				'type'              => 'Blog',
				'isPartOfType'      => array( 'Blog', 'Product' ),
				'isPartOfProductId' => $twg_data['publicationID'] . ':default',
				'postTitle'         => get_the_title(),
				'permalink'         => get_permalink(),
				'pluginVersion'     => '1.85.0',
				'colorTheme'        => $twg_data['colorTheme'],
				'promptSettings'    => array(
					'style' => 'inline',
				),
			);
			$twg_inline_script = sprintf(
				'(self.SWG_BASIC=self.SWG_BASIC||[]).push(function(subscriptions){subscriptions.init(%s);});',
				wp_json_encode( $subscription )
			);

			wp_add_inline_script( 'google_thankjs', $twg_inline_script, 'before' );
			wp_enqueue_script( 'google_thankjs' );
		}
	}

	if ( 
		has_block( 'google-site-kit/supporter-wall' ) &&
		! wp_script_is( 'google_thankjs', 'enqueued' )
	) {
		wp_enqueue_script( 'google_thankjs' );
	}
}
add_action( 'wp_enqueue_scripts', 'front_assets' );
