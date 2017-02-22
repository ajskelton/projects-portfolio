<?php
/**
 * Portfolio Projects Module Handler
 *
 * @package   Ajskelton\PortfolioProjects
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace Ajskelton\PortfolioProjects;

/**
 * Autoload plugin files
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload() {
	$files = array(
		'custom/post-type.php',
		'custom/taxonomy.php',
	);

	foreach ( $files as $file ) {
		include( __DIR__ . '/' . $file );
	}
}

autoload();

register_activation_hook( PROJECTS_PORTFOLIO_PLUGIN, __NAMESPACE__ . '\activate_the_plugin' );
/**
 * Initialize the rewrites for our new custom post type
 * upon activation
 *
 * @since 1.0.0
 *
 * @return void
 */
function activate_the_plugin() {
	Custom\register_faq_custom_post_type();
//	Custom\register_custom_taxonomies();

	flush_rewrite_rules();
}

register_deactivation_hook( PROJECTS_PORTFOLIO_PLUGIN, __NAMESPACE__ . '\deactivate_plugin' );
/**
 * The plugin is deactivating. Delete out the rewrite rules option.
 *
 * @since 1.0.0
 *
 * @return void
 */
function deactivate_plugin() {
	delete_option( 'rewrite_rules' );
}

register_uninstall_hook( PROJECTS_PORTFOLIO_PLUGIN, __NAMESPACE__ . '\uninstall_plugin' );
/**
 * Plugin is being uninstalled. Clean up after ourselves
 *
 * @since 1.0.0
 *
 * @return void
 */
function uninstall_plugin() {
	delete_option( 'rewrite_rules' );
}
