<?php
/**
 * waynesfeed functions and definitions
 *
 * @package waynesfeed
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'waynesfeed_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function waynesfeed_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on waynesfeed, use a find and replace
	 * to change 'waynesfeed' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'waynesfeed', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'waynesfeed' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'waynesfeed_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // waynesfeed_setup
add_action( 'after_setup_theme', 'waynesfeed_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function waynesfeed_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'waynesfeed' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'waynesfeed_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function waynesfeed_scripts() {
	wp_enqueue_style( 'waynesfeed-style', get_stylesheet_uri() );

	wp_enqueue_style( 'Oswald', 'http://fonts.googleapis.com/css?family=Oswald:400,300,700', false, false, false);
	wp_enqueue_style( 'Roboto', 'http://fonts.googleapis.com/css?family=Roboto:400,700,100,100italic', false, false, false);

	wp_enqueue_script( 'waynesfeed-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'waynesfeed-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'waynesfeed_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

/**
* Create cutsom post type for Products.
*/
add_action( 'init', 'create_my_post_types' );

function create_my_post_types() {
 register_post_type( 'product', 
 array(
      'labels' => array(
      	'name' => __( 'Products' ),
      	'singular_name' => __( 'Product' ),
      	'add_new' => __( 'Add New' ),
      	'add_new_item' => __( 'Add New Product' ),
      	'edit' => __( 'Edit' ),
      	'edit_item' => __( 'Edit Product' ),
      	'new_item' => __( 'New Product' ),
      	'view' => __( 'View Product' ),
      	'view_item' => __( 'View Product' ),
      	'search_items' => __( 'Search Products' ),
      	'not_found' => __( 'No Products found' ),
      	'not_found_in_trash' => __( 'No Products found in Trash' ),
      	'parent' => __( 'Parent Product' ),
      ),
 'public' => true,
      'menu_position' => 4,
      'rewrite' => array('slug' => 'products'),
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
      'taxonomies' => array('category', 'post_tag'),
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
     )
  );
}
