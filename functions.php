<?php
/**
 * ARZ-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ARZ-theme
 */

if ( ! defined( 'ARZ_THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ARZ_THEME_VERSION', '1.0.0' );
}

if ( ! function_exists( 'arz_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function arz_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'arz-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-primary' => esc_html__( 'Primary', 'arz-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for editor styles to provide a consistent editing experience.
		 * This is especially useful with Tailwind CSS.
		 */
		add_theme_support( 'editor-styles' );

		/**
		 * Enqueue editor styles.
		 * This should point to your compiled CSS file from your Node.js build process.
		 */
		add_editor_style( 'dist/app.css' );
	}
endif;
add_action( 'after_setup_theme', 'arz_theme_setup' );

/**
 * Disable oEmbeds
 */
function disable_embeds(){
    // Remove the oEmbed REST API route
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );

    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );

    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    
    // Remove all embeds rewrite rules.
    add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
}
add_action('init', 'disable_embeds', 9999);

function disable_embeds_rewrites($rules) {
    foreach($rules as $rule => $rewrite) {
        if(false !== strpos($rewrite, 'embed=true')) {
            unset($rules[$rule]);
        }
    }
    return $rules;
}

/**
 * Disable Gutenberg block library CSS
 */
function remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // If you have WooCommerce
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

function arz_theme_enqueue_styles() {

	// CLEAR


    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_action('wp_head', 'rsd_link'); // Really Simple Discovery
remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head', 'wp_generator'); // WordPress version
remove_action('wp_head', 'shortlink_wp_head'); // Shortlink for posts

    wp_enqueue_style(
        'main',
        get_template_directory_uri() . '/style.css',
        [],
        '1.0.0' // Możesz tu dać wersję lub filemtime() do debugowania
    );
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
    wp_enqueue_style(
        'arz-theme-tailwind',
        get_template_directory_uri() . '/src/input.css',
        [],
        '1.0.0' // Możesz tu dać wersję lub filemtime() do debugowania
    );
}
add_action( 'wp_enqueue_scripts', 'arz_theme_enqueue_styles' );

/**
 * Add defer attribute to scripts for better performance.
 *
 * @param string $tag    The <script> tag for the enqueued script.
 * @param string $handle The script's handle.
 * @return string The modified <script> tag.
 */
function arz_theme_add_defer_attribute( $tag, $handle ) {
	// Add defer attribute only to your theme's main script.
	if ( 'arz-theme-script' === $handle ) {
		$tag = str_replace( ' src', ' defer src', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'arz_theme_add_defer_attribute', 10, 2 );

/**
 * You can add your custom functions, post types, and taxonomies below this line.
 */

