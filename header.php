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
    <link href="wp-content/themes/julianablumenschein/fonts/fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet">
    <!--<script src="https://kit.fontawesome.com/da5273f50f.js" crossorigin="anonymous" async></script>-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400&display=swap" rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--<link rel="stylesheet" href="/wp-content/themes/julianablumenschein/swiper/package/css/swiper.min.css">-->
    <script src="/wp-content/themes/julianablumenschein/js/products-slider.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="start">
  <!--  <?php

phpinfo();
?> -->
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'julianablumenschein' ); ?></a>
        <?php
        if ( is_front_page() || is_page( 'start-neu' ) ) :
        echo "<header id='masthead' class='site-header home'>";
        else:
        echo "<header id='masthead' class='site-header nohome'>";
        endif;
        ?>
		<div class="site-branding">
            <div class="mobile-top-bg"></div>
            <?php
            if ( is_front_page() || is_page( 'start-neu' ) ) :
            ?>
                <div class="hero-cont">
                	<?php julianablumenschein_post_thumbnail('full',array('class' => 'start-hero')); ?>
                </div>
                <div class="title-cont">
				    <h1 class="site-title site-title-home"><?php bloginfo( 'name' ); ?></h1>
                </div>
                <div class="logotop home">
				    <a href="#start" rel="home"><h1 class="site-title site-title-home"><?php bloginfo( 'name' ); ?></h1></a>
                </div>
                <?php
			else :
				?>
                <div class="hero-cont">
                	<?php julianablumenschein_post_thumbnail('full',array('class' => 'start-hero')); ?>
                </div>
                <div class="logotop nohome">
				    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h1 class="site-title site-title-nohome"><?php bloginfo( 'name' ); ?></h1></a>
                </div>

            <?php //julianablumenschein_post_thumbnail('full',array('class' => 'start-hero')); ?>
				<?php
			endif;
            ?>
		</div><!-- .site-branding -->
        <?php
        if ( is_front_page() || is_page( 'start-neu' ) ) : //( ... || is_home() )
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
                ?>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-2',
                    'menu_id'        => 'social-menu',
                ) );
                ?>
            </div>
        </nav><!-- #site-navigation -->
        <?php
            else:
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
