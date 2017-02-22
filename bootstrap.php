<?php
/**
 * Projects Portfolio Plugin
 *
 * @package   Ajskelton\ProjectsPortfolio
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Projects Portfolio Plugin
 * Plugin URI: _
 * Description: A WordPress Plugin to display a portfolio of projects
 * Version: 1.0.0
 * Author: ajskelton
 * Author URI: https://anthonyskelton.com
 * Text Domain: projects-portfolio
 * Requires WP: 4.7
 * Requires PHP: 5.5
 *
 */
namespace Ajskelton\ProjectsPortfolio;

if ( ! defined( 'ABSPATH' ) ) {
	exit( "Oh, silly, there's nothing to see here." );
}

define( 'PROJECTS_PORTFOLIO_PLUGIN', __FILE__ );
define( 'PROJECTS_PORTFOLIO_DIR', plugin_dir_path( __FILE__ ) );
$plugin_url = plugin_dir_url( __FILE__ );
if( is_ssl() ) {
	$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
}
define( 'PROJECTS_PORTFOLIO_URL', $plugin_url );
define( 'PROJECTS_PORTFOLIO_TEXT_DOMAIN', 'projects-portfolio' );

include( __DIR__ . '/src/plugin.php' );
