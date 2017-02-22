<?php
/**
 * Plugin Handler
 *
 * @package   Ajskelton\ProjectsPortfolio
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace Ajskelton\ProjectsPortfolio;


/**
 * Autoload plugin files
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload() {
	$files = array(
		'projects/module.php',
	);

	foreach( $files as $file ) {
		include( __DIR__ . '/' . $file );
	}
}

autoload();