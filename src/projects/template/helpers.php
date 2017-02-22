<?php
/**
 * Template Helpers
 *
 * @package   Ajskelton\ProjectsPortfolio\Projects\Template
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace Ajskelton\ProjectsPortfolio\Projects\Template;

add_filter( 'single_template', __NAMESPACE__ . '\load_the_project_single_template' );
/**
 * Load the FAQ Archive template from our plugin.
 *
 * @since 1.0.0
 *
 * @param string $theme_archive_template Full qualified path to the archive template
 *
 * @return string
 */
function load_the_project_single_template( $theme_archive_template ) {

	if ( ! is_singular( 'project' ) ) {
		return $theme_archive_template;
	}

	$plugin_archive_template = __DIR__ . '/single-project.php';

	if ( ! $theme_archive_template ) {
		return $plugin_archive_template;
	}

	if ( strpos( $theme_archive_template, '/single-project.php' ) === false ) {
		return $plugin_archive_template;
	}

	return $theme_archive_template;
}