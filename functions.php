<?php
/**
 * _tk functions and definitions
 *
 * @package _tk
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( '_tk_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function _tk_setup() {
	global $cap, $content_width;

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	/**
	 * Add default posts and comments RSS feed links to head
	*/
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for Post Formats
	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( '_tk_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _tk, use a find and replace
	 * to change '_tk' to the name of your theme in all the template files
	*/
	load_theme_textdomain( '_tk', get_template_directory() . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary'  => __( 'Main Menu', '_tk' ),
        'footer-menu' => ('footer menu')
	) );

}
endif; // _tk_setup
add_action( 'after_setup_theme', '_tk_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function _tk_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_tk' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<section id="%1$s" class="widget %1$s col-md-2">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

function _tk_widgets2_init() {
    register_sidebar( array(
        'name'          => __( 'newsletter', '_tk' ),
        'id'            => 'newsletter',
        'before_widget' => '<section id="%1$s" class="widget %1$s col-md-3">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}

function _tk_widgets3_init() {
    register_sidebar( array(
        'name'          => __( 'call2action', '_tk' ),
        'id'            => 'call2action',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}



add_action( 'widgets_init', '_tk_widgets_init' );

add_action( 'widgets_init', '_tk_widgets2_init' );

add_action( 'widgets_init', '_tk_widgets3_init' );



/**
 * Enqueue scripts and styles
 */
function _tk_scripts() {

	// Import the necessary TK Bootstrap WP CSS additions
	wp_enqueue_style( '_tk-bootstrap-wp', get_template_directory_uri() . '/includes/css/bootstrap-wp.css' );

	// load bootstrap css
	wp_enqueue_style( '_tk-bootstrap', get_template_directory_uri() . '/includes/resources/bootstrap/css/bootstrap.min.css' );

	// load Font Awesome css
	wp_enqueue_style( '_tk-font-awesome', get_template_directory_uri() . '/includes/css/font-awesome.min.css', false, '4.1.0' );

	// load _tk styles
	wp_enqueue_style( '_tk-style', get_stylesheet_uri() );

    // Owl stylesheet

    wp_enqueue_style( 'owl_style1', get_template_directory_uri() . '/includes/owl-carousel/owl.carousel.css' );
    wp_enqueue_style( 'owl_style2', get_template_directory_uri() . '/includes/owl-carousel/owl.theme.css' );

    //custom-style

    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/includes/css/main.css' );
    wp_enqueue_style( 'media_css', get_template_directory_uri() . '/includes/css/media.css' );


	// load bootstrap js
	wp_enqueue_script('_tk-bootstrapjs', get_template_directory_uri().'/includes/resources/bootstrap/js/bootstrap.min.js', array('jquery') );

	// load bootstrap wp js
	wp_enqueue_script( '_tk-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );

	wp_enqueue_script( '_tk-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '', true );


    //jq
    wp_enqueue_script('jq', get_template_directory_uri() . '/includes/js/jquery.min.js', array(), '', true);

    // owl scripts
    wp_enqueue_script( 'owl_script', get_template_directory_uri() . '/includes/owl-carousel/owl.carousel.js', array(), '', true);

    // main js
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/includes/js/main.js', array(), '20130115', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( '_tk-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

}

add_action( 'wp_enqueue_scripts', '_tk_scripts' );



add_action('init', 'services');
function services(){
    register_post_type('services', array(
        'public' => true,
        'supports' => array('title', 'thumbnail','editor','excerpt' ),
        'labels' => array(
            'name' => 'services',
            'all_items' => 'all services',
            'add_new' => 'add service',
            'add_new_item' => 'add new service'

        )
    ) );
}

add_action('init', 'latestWork');
function latestWork(){
    register_post_type('latestWork', array(
        'public' => true,
        'supports' => array('title', 'thumbnail','editor'),
        'labels' => array(
            'name' => 'latestWorks',
            'all_items' => 'all latestWorks',
            'add_new' => 'add latestWork',
            'add_new_item' => 'add new latestWork'

        )
    ) );
}


add_action('init', 'slider');
function slider(){
    register_post_type('slider', array(
        'public' => true,
        'supports' => array('title', 'thumbnail','editor'),
        'labels' => array(
            'name' => 'slider',
            'all_items' => 'all slides',
            'add_new' => 'add slide',
            'add_new_item' => 'add new slide'

        )
    ) );
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';