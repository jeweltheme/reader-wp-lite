<?php
/**
 * Reader functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Reader-Wp-Lite
 */

define("READER_WP_LITE_CSS",get_template_directory_uri() . "/assets/css/");
define("READER_WP_LITE_JS",get_template_directory_uri() . "/assets/js/");

if ( ! function_exists( 'reader_wp_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function reader_wp_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Reader, use a find and replace
	 * to change 'reader-wp-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'reader-wp-lite', get_template_directory() . '/languages' );

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

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 210,
		'height'      => 100,
		'flex-width'  => true,
	) );
	
	add_image_size('reader_wp_lite_post_thumb','880', '410', true);
	add_image_size('reader_wp_lite_full','880', '410', true);

	add_image_size( 'reader_wp_lite_blog-thumb', '850', '260', false );
	// This theme uses wp_nav_menu() in one location.

	register_nav_menus( array(
	    'primary' => __( 'Primary Menu', 'reader-wp-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	
}
endif;
add_action( 'after_setup_theme', 'reader_wp_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function reader_wp_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'reader_wp_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'reader_wp_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function reader_wp_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'reader-wp-lite' ),
		'id'            => 'blog-sidebar',
		'description'   => esc_html__( 'Add Blog Sidebar Widgets here.', 'reader-wp-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'reader_wp_lite_widgets_init' );


/*
Enque Google Fonts
*/


function reader_wp_lite_google_fonts() {
    $font_url = '';   
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'reader-wp-lite' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Oswald:300italic,400italic,700italic,400,700,300|Open Sans:300italic,400italic,700italic,400,700,300|Roboto:300italic,400italic,700italic,400,700,300' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}



/**
 * Enqueue scripts and styles.
 */
function reader_wp_lite_scripts() {
	
	wp_enqueue_style( 'themify-icons',READER_WP_LITE_CSS . "themify-icons.css" );
	wp_enqueue_style( 'font-awesome',READER_WP_LITE_CSS . "font-awesome.min.css" );
	wp_enqueue_style( 'bootstrap',READER_WP_LITE_CSS . "bootstrap.min.css" );
	wp_enqueue_style( 'magnific-popup',READER_WP_LITE_CSS . "magnific-popup.css" );
	wp_enqueue_style( 'reader-theme',READER_WP_LITE_CSS . "themes.css" );
	wp_enqueue_style( 'reader-theme-style',READER_WP_LITE_CSS . "style.css" );
	wp_enqueue_style( 'reader-google-fonts', reader_wp_lite_google_fonts() );
	wp_enqueue_style( 'reader-style', get_stylesheet_uri() );


	wp_enqueue_script( 'reader-modernizr', READER_WP_LITE_JS . "modernizr.min.js", array('jquery'), '', true );
	wp_enqueue_script( 'reader-plugins', READER_WP_LITE_JS . "plugins.js", array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap', READER_WP_LITE_JS . "bootstrap.min.js", array('jquery'), '', true );
	wp_enqueue_script( 'magnific-popup', READER_WP_LITE_JS . "jquery.magnific-popup.min.js", array('jquery'), '', true );
	wp_enqueue_script( 'reader-main', READER_WP_LITE_JS . "main.js", array('jquery'), '',true );
 	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'reader_wp_lite_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/* Bootstrap Navwalker */

require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';



add_filter('get_search_form', 'reader_wp_lite_search_form');
    
   function reader_wp_lite_search_form($form) {
   	$form = '<form role="search" class="search-form" method="get" action="' . esc_url( home_url( '/' ) ) . '" >
   		<input class="search-field" type="text" name="s" id="s" value="' . get_search_query() . '" 
   		placeholder="' . esc_attr__( 'Search', 'reader-wp-lite' ) . '" required>
   		
  	</form>';
  
 return $form;
 }

 /**
 * Registers an editor stylesheet for the theme.
 */
function reader_wp_lite_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'reader_wp_lite_add_editor_styles' );



/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function reader_wp_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'reader_wp_lite_pingback_header' );