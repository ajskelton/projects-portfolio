<?php
/**
 * Single Template file for Project CPT
 *
 * @package   Ajskelton\ProjectsPortfolio\Projects\Template
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace Ajskelton\ProjectsPortfolio\Projects\Template;

// Remove the header section with title and post info
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_entry_content', 'genesis_do_post_title', 7 );
add_action( 'genesis_entry_content', 'genesis_post_info', 8);

add_action( 'genesis_entry_content', __NAMESPACE__ . '\display_featured_image', 6 );
/**
 * Print the Featured Image to the Entry Content
 *
 * @since 1.0.0
 *
 * @return void
 */
function display_featured_image() {

	$img = genesis_get_image( array(
		'format'  => 'html',
		'size'    => genesis_get_option( 'image_size' ),
		'context' => 'archive',
		'attr'    => genesis_parse_attr( 'content-image', array( 'alt' => get_the_title() ) ),
	) );

	print( $img );
}

genesis();

