<?php
/**
 * Portfolio Projects Plugin
 *
 * @package   Ajskelton\PortfolioProjects
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Portfolio Projects Plugin
 * Plugin URI: _
 * Description: A WordPress Plugin to display a portfolio of projects
 * Version: 1.0.0
 * Author: ajskelton
 * Author URI: https://anthonyskelton.com
 * Text Domain: portfolio-projects
 * Requires WP: 4.7
 * Requires PHP: 5.5
 *
 */
namespace Ajskelton\PortfolioProjects;

if ( ! defined( 'ABSPATH' ) ) {
	exit( "Oh, silly, there's nothing to see here." );
}

define( 'PORTFOLIO_PROJECTS_PLUGIN', __FILE__ );
define( 'PORTFOLIO_PROJECTS_DIR', plugin_dir_path( __FILE__ ) );
$plugin_url = plugin_dir_url( __FILE__ );
if( is_ssl() ) {
	$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
}
define( 'PORTFOLIO_PROJECTS_URL', $plugin_url );
define( 'PORTFOLIO_PROJECTS_TEXT_DOMAIN', 'portfolio-projects' );

include( __DIR__ . '/src/plugin.php' );
