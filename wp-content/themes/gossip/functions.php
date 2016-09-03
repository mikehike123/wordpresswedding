<?php
/**
 * gossip functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package gossip
 */

if ( ! function_exists( 'gossip_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gossip_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gossip, use a find and replace
	 * to change 'gossip' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gossip', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'gossip' ),
	) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Editor Style.
	 */

	function gossip_add_editor_styles() {

	    add_editor_style( '/css/gossip-editor-style.css' );
	}
	add_action( 'after_setup_theme', 'gossip_add_editor_styles' );


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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'image',
		'video',
		'audio',
		'quote',
		'link',
	) );

	 /* woocommerce support */
	add_theme_support( 'woocommerce' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gossip_custom_background_args', array(
		'default-color' => 'ffffff',
		'transport'     => 'refresh'
	) ) );
}
endif; // gossip_setup
add_action( 'after_setup_theme', 'gossip_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gossip_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gossip_content_width', 640 );
}
add_action( 'after_setup_theme', 'gossip_content_width', 0 );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gossip_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget', 'gossip' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div class="gossip-sidebar-container">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'gossip' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gossip_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function gossip_scripts() {

	/**
	* Enqueue styles
	*/

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'gossip-style', get_stylesheet_uri() );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );

	/**
	* Enqueue scripts
	*/

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '3.3.6', true );
	wp_enqueue_script( 'gossip-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'mtree', get_template_directory_uri() . '/js/mtree.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gossip_scripts' );

/**
 * Enqueue google fonts.
 */
function gossip_google_fonts() {
    $query_args = array(
        'family' => 'Lato:400,300,300italic,400italic,700,700italic%7CLustria',
        'subset' => 'latin,latin-ext',
    );
    wp_register_style( 'gossip-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

}
add_action('wp_enqueue_scripts', 'gossip_google_fonts');


/**
 * Theme Customizer
 */

function gossip_customizer_register($wp_customize) {
	/**
	 * Gossip Logo setting section
	 */
	$wp_customize-> add_section('gossip_logo_setting', array(
			'title'             => __('Gossip Logo', 'gossip'),
			'description'       => __('Gossip theme logo option settings', 'gossip'),
			'priority'          => 30
	));

	// Setting & control for logo
	$wp_customize->add_setting('gossip_logo_toggle' , array(
			'default'           => 2,
			'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'gossip_logo_toggle' , array(
			'label'             => __('Enable/Disable logo' , 'gossip'),
			'section'           => 'gossip_logo_setting',
			'settings'          => 'gossip_logo_toggle',
			'type'              => 'select',
            'choices'           => array(
                	1   => __('Enabled', 'gossip'),
               		2   => __('Disabled', 'gossip')
            )
		)
	));

	// Setting & control for logo
	$wp_customize->add_setting('gossip_logo' , array(
			'default'           => get_template_directory_uri() . '/img/logo.png',
			'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'gossip_logo' , array(
			'label'             => __('Upload you logo' , 'gossip'),
			'section'           => 'gossip_logo_setting',
			'settings'          => 'gossip_logo',
		)
	));


	/**
	 * Gossip Social media icon settings
	 */
	$wp_customize-> add_section('gossip_social_media_icons', array(
			'title'             => __('Social Media', 'gossip'),
			'description'       => __('Social Media links', 'gossip'),
			'priority'          => 30
	));

	// Setting & control facebook icon
	$wp_customize->add_setting('gossip_social_facebook' , array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'gossip_social_facebook' , array(
			'label'             => __('Enter facebook link' , 'gossip'),
			'section'           => 'gossip_social_media_icons',
			'settings'          => 'gossip_social_facebook',
		)
	));

	// Setting & control twitter icon
	$wp_customize->add_setting('gossip_social_twitter' , array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'gossip_social_twitter' , array(
			'label'             => __('Enter twitter link' , 'gossip'),
			'section'           => 'gossip_social_media_icons',
			'settings'          => 'gossip_social_twitter',
		)
	));

	// Setting & control youtube icon
	$wp_customize->add_setting('gossip_social_youtube' , array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'gossip_social_youtube' , array(
			'label'             => __('Enter youtube link' , 'gossip'),
			'section'           => 'gossip_social_media_icons',
			'settings'          => 'gossip_social_youtube',
		)
	));

	// Setting & control google plus icon
	$wp_customize->add_setting('gossip_social_google_plus' , array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'gossip_social_google_plus' , array(
			'label'             => __('Enter google plus link' , 'gossip'),
			'section'           => 'gossip_social_media_icons',
			'settings'          => 'gossip_social_google_plus',
		)
	));

	// Setting & control behance icon
	$wp_customize->add_setting('gossip_social_behance' , array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'gossip_social_behance' , array(
			'label'             => __('Enter behance link' , 'gossip'),
			'section'           => 'gossip_social_media_icons',
			'settings'          => 'gossip_social_behance',
		)
	));

	// Setting & control linkedin icon
	$wp_customize->add_setting('gossip_social_linkedin' , array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'gossip_social_linkedin' , array(
			'label'             => __('Enter linkedin link' , 'gossip'),
			'section'           => 'gossip_social_media_icons',
			'settings'          => 'gossip_social_linkedin',
		)
	));

	// Setting & control instagram icon
	$wp_customize->add_setting('gossip_social_instagram' , array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'gossip_social_instagram' , array(
			'label'             => __('Enter instagram link' , 'gossip'),
			'section'           => 'gossip_social_media_icons',
			'settings'          => 'gossip_social_instagram',
		)
	));


	/**
	 * Gossip Footer text Sectoions
	 */
	$wp_customize-> add_section('gossip_footer_text_setting', array(
			'title'             => __('Footer Text', 'gossip'),
			'description'       => __('Footer Copyright text', 'gossip'),
			'priority'          => 30
	));

	// Setting & control footer text
	$wp_customize->add_setting('gossip_footer_text' , array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'gossip_footer_text' , array(
			'label'             => __('Change footer copyright text' , 'gossip'),
			'section'           => 'gossip_footer_text_setting',
			'settings'          => 'gossip_footer_text',
		)
	));
}

add_action('customize_register', 'gossip_customizer_register');

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
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';