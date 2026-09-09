<?php
/**
 * julianablumenschein functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package julianablumenschein
 */

if ( ! function_exists( 'julianablumenschein_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function julianablumenschein_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on julianablumenschein, use a find and replace
		 * to change 'julianablumenschein' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'julianablumenschein', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'julianablumenschein' ),
            'menu-2' => esc_html__( 'Social', 'julianablumenschein' ),
            'menu-3' => esc_html__( 'Corporate', 'julianablumenschein' ),
            'menu-4' => esc_html__( 'Primary-Footer', 'julianablumenschein' ),  
			'menu-5' => esc_html__( 'Woocommerce', 'julianablumenschein' )   
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
		add_theme_support( 'custom-background', apply_filters( 'julianablumenschein_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'julianablumenschein_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function julianablumenschein_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'julianablumenschein_content_width', 640 );
}
add_action( 'after_setup_theme', 'julianablumenschein_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function julianablumenschein_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'julianablumenschein' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'julianablumenschein' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'julianablumenschein_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function julianablumenschein_scripts() {
	wp_enqueue_style( 'julianablumenschein-style', get_stylesheet_uri() );

	wp_enqueue_script( 'julianablumenschein-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'julianablumenschein-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'julianablumenschein_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*
$defaults = array(
	'default-image'          => '',
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );
*/

// Add Support for Custom Header
// add_theme_support( 'custom-header' );


// add_theme_support( 'editor-styles' );
// add_theme_support( 'dark-editor-style' );
// add_theme_support( 'wp-block-styles' );

// New Custom page types
add_action( 'init', 'create_post_type' );
function create_post_type() {
  // YouTube    
  register_post_type( 'videos',
    array(
      'labels' => array(
        'name' => __( 'Videos' ),
        'singular_name' => __( 'Videos' )
      ),
      'public' => true,
      'hierarchical' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail'),
      'menu_icon' => 'dashicons-video-alt3',
      'show_in_rest' => true,    
      'menu_position' => 25        
    )
  );
  // Bands      
  register_post_type( 'bands',
    array(
      'labels' => array(
        'name' => __( 'Bands' ),
        'singular_name' => __( 'Bands' )
      ),
      'public' => true,
      'hierarchical' => true,        
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),     
	  'show_in_rest' => true,   
      'menu_icon' => 'dashicons-format-audio',
    )
  );   
 // Dates      
  register_post_type( 'dates',
    array(
      'labels' => array(
        'name' => __( 'Dates' ),
        'singular_name' => __( 'Date' )
      ),
      'public' => true,
      'hierarchical' => true,
      'has_archive' => true,
      'supports' => array('title','page-attributes'),        
      'menu_icon' => 'dashicons-calendar',
      'show_in_rest' => true,    
    )
  );  
  // Instagram    
  register_post_type( 'news',
    array(
      'labels' => array(
        'name' => __( 'News' ),
        'singular_name' => __( 'News' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,        
      'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),        
      'menu_icon' => 'dashicons-format-gallery',
      'show_in_rest' => true,
    )
  );    
  // Kontaktformular      
  register_post_type( 'contact',
    array(
      'labels' => array(
        'name' => __( 'Contact' ),
        'singular_name' => __( 'Contact' )  
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,        
      'menu_icon' => 'dashicons-format-chat',
      'show_in_rest' => true,    
      'menu_position' => 25
    )
  ); 
  // Newsletter      
  register_post_type( 'newsletter',
    array(
      'labels' => array(
        'name' => __( 'Newsletter' ),
        'singular_name' => __( 'Newsletter' )  
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,        
      'menu_icon' => 'dashicons-email',
      'show_in_rest' => true,
      'menu_position' => 26
    )
  );     
}

// smashballoon Instagram Feed 
function sb_change_for_cdn() {
?>
<script>
    if (typeof window.sb_instagram_js_options !== 'undefined') {
        window.sb_instagram_js_options.resized_url = 'https://smashballoon.cdn.net/wp-content/uploads/sb-instagram-feed-images/';
    }
</script>
<?php
}
add_action( 'wp_footer', 'sb_change_for_cdn', 99 );


// Plus Minus Buttons on Quantity - Woocommerce

add_action( 'woocommerce_after_add_to_cart_quantity', 'ts_quantity_plus_sign' );
 
function ts_quantity_plus_sign() {
   echo '<button type="button" class="quantity-button plus"  id="quantity-plus">+</button>';
}
 
add_action( 'woocommerce_before_add_to_cart_quantity', 'ts_quantity_minus_sign' );
function ts_quantity_minus_sign() {
   echo '<button type="button" class="quantity-button minus" id="quantity-minus">-</button>';
}
 
add_action( 'wp_footer', 'ts_quantity_plus_minus' );
 
function ts_quantity_plus_minus() {
   // To run this on the single product page
   //if ( ! is_product() ) return;
   ?>
   <script type="text/javascript" id="ts_quantity_plus_minus">
          
      jQuery(document).ready(function($){   
          
            $('form.cart').on( 'click', 'button.plus, button.minus', function() {
 
            // Get current quantity values
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
 
            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } 
            else {
               qty.val( val + step );
                 }
            } 
            else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } 
               else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }
             
         });
          
      });
          
   </script>
   <?php
}


add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

function gallery_scripts() {
        if ( current_theme_supports( 'wc-product-gallery-zoom' ) ) { 
            wp_enqueue_script( 'zoom' );
        }
        if ( current_theme_supports( 'wc-product-gallery-slider' ) ) {
            wp_enqueue_script( 'flexslider' );
        }
        if ( current_theme_supports( 'wc-product-gallery-lightbox' ) ) {
            wp_enqueue_script( 'photoswipe-ui-default' );
            wp_enqueue_style( 'photoswipe-default-skin' );
            add_action( 'wp_footer', 'woocommerce_photoswipe' );
        }
        wp_enqueue_script( 'wc-single-product' );
}

add_action( 'wp_enqueue_scripts', 'gallery_scripts', 20 );

add_filter( 'woocommerce_get_image_size_gallery_thumbnail', 'cg_woocommerce_image_size_gallery_thumbnail', 99 );
function cg_woocommerce_image_size_gallery_thumbnail( $size ) {
    return array(
        'width'  => 200,
        'height' => 200,
        'crop'   => 1,
    );
}