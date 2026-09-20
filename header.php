<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package julianablumenschein
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( get_template_directory_uri() . '/img/juliana_blumenschein_logo_compact.svg' ); ?>">
    <link href="wp-content/themes/julianablumenschein/fonts/fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=Ubuntu+Mono&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="start">
<?php // phpinfo(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'julianablumenschein' ); ?></a>
    <?php
    // Determine site name, location, and logo content based on the current page
    $site_name = get_bloginfo( 'name', 'display' );
    $location = ( is_front_page() || is_page( 'start-neu-928' ) ) ? 'home' : 'nohome';
    if ( is_page( 'start-neu-928' ) ) {
        $logo_url = esc_url( get_template_directory_uri() . '/img/juliana_blumenschein_logo_red.svg' );
        $logotop_content = "<img class='logo' src='" . $logo_url . "' alt='" . esc_attr( $site_name . ' logo' ) . "'>";
    } else {
        $logotop_content = "<h1 class='site-title site-title-home'>" . esc_html( $site_name ) . "</h1>";
    }

    ob_start(); // Start output buffering for navigation menu
    ?>
    <nav id="site-navigation" class="main-navigation">
        <div class="section-content centered">
            <div class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <div id="hamburger">
                    <div class="hamburger-line"></div>
                    <div class="hamburger-line"></div>
                    <div class="hamburger-line"></div>
                </div>
            </div>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
            ) );
            wp_nav_menu( array(
                'theme_location' => 'menu-2',
                'menu_id'        => 'social-menu',
            ) );
            ?>
        </div>
    </nav><!-- #site-navigation -->
    <?php
    $navigation = ob_get_clean(); // Get the buffered navigation menu content and clean the buffer
    
    if ( is_page( 'start-neu-928' ) ) :
    ?>
    <div class="header-wrapper">
        <div class="logotop <?php echo $location; ?>">
            <a href="#start" rel="home">
                <?php echo $logotop_content; ?>
            </a>
        </div>
        <?php
        echo $navigation; // Display navigation menu on the specific page
        ?>
    </div>
    <?php        
    endif;
    echo "<header id='masthead' class='site-header " . $location . "'>";
    ?>
            <div class="site-branding">
            <div class="mobile-top-bg"></div>
            <div class="hero-cont">
                <?php julianablumenschein_post_thumbnail('full',array('class' => 'start-hero')); ?>
            </div>
            <?php
            if ( ! is_page( 'start-neu-928' ) ) :
            ?>
            <div class="title-cont">
                <h1 class="site-title site-title-<?php echo $location; ?>"><?php echo $site_name; ?></h1>
            </div>
            <div class="logotop <?php echo $location; ?>">
                <a href="#start" rel="home">
                    <?php echo $logotop_content; ?>
                </a>
            </div>
            <?php
            endif;
            ?>
		</div><!-- .site-branding -->
        <?php
        if ( is_front_page() && !is_page( 'start-neu-928' ) ) : //( ... || is_home() )
        ?>
        <?php echo $navigation; ?>  // Display navigation menu on the front page
        <?php
        elseif ( !is_front_page() && !is_page( 'start-neu-928' ) ) : //( ... || is_home() )
        ?>
        <nav id="site-navigation" class="main-navigation">
            <div class="section-content centered">    
            <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-2',
                'menu_id'        => 'social-menu',
            ) );
            ?>    
            </div>    
		</nav><!-- #site-navigation -->            
        <?php
        endif;
        ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
