<?php

/**
 * Child Theme Functions
 *
 * Functions or examples that may be used in a child them. Don't for get to edit them, to get them working.
 *
 * @link https://make.wordpress.org/core/handbook/inline-documentation-standards/php-documentation-standards/#6-file-headers
 * @since 20150711.1
 *
 * @category            WordPress_Theme
 * @package             Divi_All
 * @subpackage          theme
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'RODIVIBASE_VERSION', '20160208.1' );
define( 'RODIVIBASE_CDIR', get_stylesheet_directory() ); // if child, will be the file path, with out backslash
define( 'RODIVIBASE_CURI', get_stylesheet_uri() ); // URL, if child, will be the url to the theme directory, no back slash

remove_action( 'wp_head', 'wp_generator' );

/**
 * By default WordPress adds all sorts of code between the opening and closing head tags of a WordPress theme
 * So lets clean out some of them
 *
 */
function ro_removeHeadLinks() {
	/** remove some header information  **/
	remove_action( 'wp_head', 'feed_links_extra', 3 );  //category feeds
	remove_action( 'wp_head', 'feed_links', 2 );        //post and comments feed, see ro_enqueue_default_feed_link()
	remove_action( 'wp_head', 'rsd_link' );              //only required if you are looking to blog using an external tool
	remove_action( 'wp_head', 'wlwmanifest_link' );      //something to do with windows live writer
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 ); //next previous post links
	remove_action( 'wp_head', 'wp_generator' );          //generator tag ie WordPress version info
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );  //short links like ?p=124
}

add_action( 'init', 'ro_removeHeadLinks' );


/**
 * above we remove all feed (RSS) links lets put them back, for post content.
 * in ro_remove_head_links() we had to remove the post and comments rss link
 * now we want to add rss back just for post content
 * because feed_links() adds both the comments and posts feeds
 *
 * @see ro_remove_head_links()
 */
function ro_enqueue_default_feed_link() {
	echo "<link rel='alternate' type='application/rss+xml' title='" . get_bloginfo( 'name' ) . " &raquo; Feed' href='" . get_feed_link() . "' />";
}

add_action( 'wp_head', 'ro_enqueue_default_feed_link' );


/**
 * Load the Parent and Child  Theme CSS.
 * This faster than a css @import
 */
function ro_theme_enqueue_styles() {
	wp_enqueue_style( 'ro-parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'ro_theme_enqueue_styles' );

/**
 * Load a custom.css style sheet, if it exists in a child theme.
 *
 * @return void
 */
function ro_enqueue_custom_stylesheets() {
	if ( ! is_admin() ) {
		if ( is_child_theme() ) {
			if ( file_exists( get_stylesheet_directory() . "/custom.css" ) ) {
				wp_enqueue_style( 'ro-theme-custom-css', get_template_directory_uri() . '/custom.css' );
			}
		}
	}
}

//add_action( 'wp_enqueue_scripts', 'ro_enqueue_custom_stylesheets', 11 );


/**
 * Add custom style sheet to the HTML Editor
 **/
function ro_enqueue_editor_styles() {
	//add_editor_style( 'editor-style.css' );
	if ( file_exists( get_stylesheet_directory() . "/editor-style.css" ) ) {
		add_editor_style( 'editor-style.css' );
	}
}

//add_action( 'init', 'ro_enqueue_editor_styles' );


/**
 * EXAMPLE:
 * Add google fonts, don't forget to add the to the style.css or custom.css file.
 */
function ro_add_google_fonts() {
	wp_register_style( 'ro-googleFonts', 'http://fonts.googleapis.com/css?family=Lato' );
	wp_enqueue_style( 'ro-googleFonts' );
}

//add_action( 'wp_print_styles', 'ro_add_google_fonts' );


/**
 * Setup Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
/*
function ro_theme_setup() {
	load_child_theme_textdomain( 'ro-child-theme', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'ro_theme_setup' );
*/


/**
 * Register and load font awesome CSS files using a CDN.
 *
 * @link   http://www.bootstrapcdn.com/#fontawesome
 * @author FAT Media
 */
function ro_enqueue_awesome() {
	wp_enqueue_style( 'ro-font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array(), '4.0.3' );
}

//add_action( 'wp_enqueue_scripts', 'ro_enqueue_awesome' );

/**
 * add custom login css and js for a single site, not multi site
 * @link https://codex.wordpress.org/Customizing_the_Login_Form
 *
 */
function ro_enqueue_login_scripts() {
	if ( is_child_theme() ) {
		if ( file_exists( get_stylesheet_directory() . "/css/custom-login.css" ) ) {
			wp_enqueue_style( 'ro-custom-login-css', get_stylesheet_directory_uri() . '/css/custom-login.css' );
		}
		if ( file_exists( get_stylesheet_directory() . "/js/custom-login.js" ) ) {
			wp_enqueue_script( 'ro-custom-login-js', get_stylesheet_directory_uri() . '/js/custom-login.js' );
		}
	}
}
//add_action( 'login_enqueue_scripts', 'ro_enqueue_login_scripts' );

?>