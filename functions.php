<?php
/**
 * colonia functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package colonia
 */

if ( ! function_exists( 'colonia_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function colonia_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on colonia, use a find and replace
	 * to change 'colonia' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'colonia', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'colonia' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'colonia_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'colonia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function colonia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'colonia_content_width', 640 );
}
add_action( 'after_setup_theme', 'colonia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function colonia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'colonia' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'colonia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'colonia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function colonia_scripts() {
	wp_enqueue_style( 'colonia-style', get_stylesheet_uri() );

	wp_enqueue_script( 'colonia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'colonia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//JS
	wp_enqueue_script( 'arcoiris-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
	wp_enqueue_script( 'arcoiris-funciones', get_template_directory_uri() . '/js/funciones.js');	

	// Google Fonts
	wp_enqueue_style( 'colonia-font', 'https://fonts.googleapis.com/css?family=Caveat+Brush|Roboto:300,300i,400' );
	//Font-awesome
	wp_enqueue_style( 'colonia-font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css');
	//Slick
    wp_enqueue_style('arcoiris-slick-css', get_template_directory_uri()  .'/js/slick/slick.css');
    wp_enqueue_script('arcoiris-slick-js', get_template_directory_uri()  .'/js/slick/slick.min.js');

}
add_action( 'wp_enqueue_scripts', 'colonia_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


//Sacar barra
add_filter( 'show_admin_bar', '__return_false' );

add_filter('wp_list_pages', create_function('$t', 'return str_replace("<a ", "<a class=\"cambiar-slide\" ", $t);'));