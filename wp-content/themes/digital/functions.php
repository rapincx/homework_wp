<?php
/**
 * digital functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package digital
 */

if ( ! function_exists( 'digital_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function digital_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on digital, use a find and replace
	 * to change 'digital' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'digital', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'digital' ),
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
	add_theme_support( 'custom-background', apply_filters( 'digital_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'digital_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function digital_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'digital_content_width', 640 );
}
add_action( 'after_setup_theme', 'digital_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function digital_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'digital' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'digital' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Body-1', 'digital' ),
        'id'            => 'body-1',
        'description'   => esc_html__( 'Add widgets here.', 'digital' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s widget-1">',
        'after_widget'  => '</section>',
        'before_title'  => '<p class="body-title">',
        'after_title'   => '</p>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Body-2', 'digital' ),
        'id'            => 'body-2',
        'description'   => esc_html__( 'Add widgets here.', 'digital' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s region">',
        'after_widget'  => '</section>',
        'before_title'  => '<p class="body-title">',
        'after_title'   => '</p>',
    ) );
}
add_action( 'widgets_init', 'digital_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
add_theme_support( 'custom-logo' );
add_action('customize_register', function($customizer){
    $customizer->add_section(
        'example_section_one',
        array(
            'title' => 'Изображенние для заголовка',
            'description' => 'Изображенние',
            'priority' => 35,
        )
    );
    $customizer->add_setting('img-upload');
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'img-upload',
            array(
                'label' => 'Загрузка изображения',
                'section' => 'example_section_one',
                'settings' => 'img-upload'
            )
        )
    );
    $customizer->add_setting('img-logo');
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'img-logo',
            array(
                'label' => 'Logo',
                'section' => 'example_section_one',
                'settings' => 'img-logo'
            )
        )
    );
});
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

function wpt_register_css() {
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' );
    wp_register_style( 'style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'style' );
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );

function digital_scripts() {
    wp_register_script('jquery.min', get_template_directory_uri().'/js/jquery-2.2.4.min.js','jquery');
    wp_enqueue_script('jquery.min');
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap.min');
	wp_enqueue_style( 'digital-style', get_stylesheet_uri() );

	wp_enqueue_script( 'digital-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'digital-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'digital_scripts' );

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


add_action('init', 'register_post_types');
function register_post_types(){
	register_post_type('video', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Videos',
			'singular_name'      => 'Video',
			'add_new'            => 'Add Video',
			'add_new_item'       => 'Add new Video',
			'edit_item'          => 'Edit Video',
			'new_item'           => 'New Video',
			'view_item'          => 'View Video',
			'search_items'       => 'Search Video',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Videos',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'show_in_rest'        => null,
		'rest_base'           => null,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-video-alt3',
		'hierarchical'        => false,
		'supports'            => array('title','editor'),
		'taxonomies'          => array('directors'),
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

add_action('init', 'register_post_types_director');
function register_post_types_director(){
	register_post_type('director', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Directors',
			'singular_name'      => 'Director',
			'add_new'            => 'Add Director',
			'add_new_item'       => 'Add new Director',
			'edit_item'          => 'Edit Director',
			'new_item'           => 'New Director',
			'view_item'          => 'View Director',
			'search_items'       => 'Search Director',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Directors',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'show_in_rest'        => null,
		'rest_base'           => null,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-businessman',
		'hierarchical'        => false,
		'supports'            => array('title'),
		'taxonomies'          => array(),
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

add_action('init', 'register_post_types_director_bio');
function register_post_types_director_bio(){
	register_post_type('director_bio', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Directors Bio',
			'singular_name'      => 'Director Bio',
			'add_new'            => 'Add Director Bio',
			'add_new_item'       => 'Add new Director Bio',
			'edit_item'          => 'Edit Director Bio',
			'new_item'           => 'New Director Bio',
			'view_item'          => 'View Director Bio',
			'search_items'       => 'Search Director Bio',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Directors Bio',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'show_in_rest'        => null,
		'rest_base'           => null,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-businessman',
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail'),
		'taxonomies'          => array(),
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

add_action('init', 'create_taxonomy');
function create_taxonomy(){
	$labels = array(
		'name'              => 'Directors',
		'singular_name'     => 'Director',
		'search_items'      => 'Search Director',
		'all_items'         => 'All Directors',
		'parent_item'       => 'Parent Director',
		'parent_item_colon' => 'Parent Director:',
		'edit_item'         => 'Edit Director',
		'update_item'       => 'Update Director',
		'add_new_item'      => 'Add New Director',
		'new_item_name'     => 'New Director Name',
		'menu_name'         => 'Directors',
	);
	$args = array(
		'label'                 => '',
		'labels'                => $labels,
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_tagcloud'         => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'_builtin'              => false,
		'show_in_quick_edit'    => null,
	);
	register_taxonomy('taxonomy', array('video'), $args );
}
