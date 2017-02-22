<?php
/**
 * Add a project shortcode to render a list or single project
 *
 * @package   Ajskelton\ProjectsPortfolio\Projects\Shortcode
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace Ajskelton\ProjectsPortfolio\Projects\Shortcode;

add_shortcode( 'project', __NAMESPACE__ . '\process_the_shortcode' );
/**
 * Process the Shortcode to build a list of Projects.
 *
 * @since 1.0.0
 *
 * @param array|string $user_defined_attributes User defined attributes for this shortcode instance
 * @param string|null $content Content between the opening and closing shortcode elements
 * @param string $shortcode_name Name of the shortcode
 *
 * @return string
 */
function process_the_shortcode( $user_defined_attributes, $content, $shortcode_name ) {
	$config = get_shortcode_configuration();

	$attributes = shortcode_atts(
		$config['defaults'],
		$user_defined_attributes,
		$shortcode_name
	);

	// Typecast the post_id into an integer
	$attributes['post_id'] = (int) $attributes['post_id'];

	// If there is no post_id or project-category, return early
	if ( $attributes['post_id'] < 1 && ! $attributes['project-category'] ) {
		return '';
	}

	// Call the view file, capture it into the output buffer, and then return it.
	ob_start();

	if ( $attributes['post_id'] > 0 ) {
		render_single_project( $attributes, $config );
	} else {
		render_archive_projects( $attributes, $config );
	}

	return ob_get_clean();
}

/**
 * Render a single project called by it's post id
 *
 * @since 1.0.0
 *
 * @param array $attributes
 * @param array $config
 */
function render_single_project( array $attributes, array $config ) {
	$project = get_post( $attributes['post_id'] );
	d( $project );
}


/**
 * Render the projects from a category called through the shortcode
 *
 * @since 1.0.0
 *
 * @param array $attributes
 * @param array $config
 *
 * @return void
 */
function render_archive_projects( array $attributes, array $config ) {
	$config_args = array(
		'posts_per_page' => (int) $attributes['number_of_projects'],
		'post_type'      => 'project',
		'tax_query'      => array(
			array(
				'taxonomy' => 'project-category',
				'field'    => 'slug',
				'terms'    => $attributes['project-category'],
			),
		),
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
	);
	$query       = new \WP_Query( $config_args );
	if ( ! $query->have_posts() ) {
		return;
	}
	$term_slug = $attributes['project-category'];

	include( $config['views']['container'] );

	wp_reset_postdata();
}

/**
 * Loop through the query and render out the projects
 *
 * @since 1.0.0
 *
 * @param \WP_Query $query
 * @param array $attributes
 * @param array $config
 *
 * @return void
 */
function loop_and_render_projects( \WP_Query $query, array $attributes, array $config ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		$post_title     = get_the_title();
		$post_content   = do_shortcode( get_the_content() );
		$post_term      = $attributes['project-category'];
		$thumbnail_size = $attributes['thumbnail_size'];

		include( $config['views']['archive'] );

	}
}


/**
 * Get the configuration for the shortcode
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_shortcode_configuration() {
	return array(
		'views'    => array(
			'container' => PROJECTS_MODULE_DIR . '/views/container.php',
			'archive'   => PROJECTS_MODULE_DIR . '/views/archive.php',
		),
		'defaults' => array(
			'post_id'            => 0,
			'project-category'   => '',
			'number_of_projects' => - 1,
			'thumbnail_size'     => 'medium'
		)
	);
}