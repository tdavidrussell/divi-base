<?php

/**
 * Child Theme Functions
 *
 * Functions or examples that may be used in a child them. Don't for get to edit them, to get them working.
 *
 * @link                https://make.wordpress.org/core/handbook/inline-documentation-standards/php-documentation-standards/#6-file-headers
 * @since               20150711.1
 *
 * @category            WordPress_Theme
 * @package             Divi_All
 * @subpackage          theme
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'RODIVIBASE_VERSION', '20181203.1' );
define( 'RODIVIBASE_CDIR', get_stylesheet_directory() ); // if child, will be the file path, with out backslash
define( 'RODIVIBASE_CURI', get_stylesheet_uri() ); // URL, if child, will be the url to the theme directory, no back slash


require( RODIVIBASE_CDIR . '/includes/functions-admin-post-images.php' );
require( RODIVIBASE_CDIR . '/includes/functions-blog-module.php' );
//require( RODIVIBASE_CDIR . '/includes/functions-extra-projects.php' );
require( RODIVIBASE_CDIR . '/includes/functions-header.php' );
require( RODIVIBASE_CDIR . '/includes/functions-images.php' );
//require( RODIVIBASE_CDIR . '/includes/functions-login.php' );
//require( RODIVIBASE_CDIR . '/includes/functions-post-private-note.php' );
require( RODIVIBASE_CDIR . '/includes/functions-rone.php' );
//require( RODIVIBASE_CDIR . '/includes/functions-users.php' );


/**
 * Setup Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
/*
function rone_theme_setup() {
	load_child_theme_textdomain( 'rone-child-theme', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'rone_theme_setup' );
*/


?>