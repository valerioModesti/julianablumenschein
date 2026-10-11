<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package julianablumenschein
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="section-content centered">
            <div class="footer-col left">
                <div id="social-menu-footer">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-2',
                        'menu_id'        => 'social-menu',
                    ) );
                    ?>
                </div>
                <div id="corporate-menu-footer">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-3',
                        'menu_id'        => 'corporate-menu',
                    ) );
                    ?>
                </div>
            </div>
            <div class="footer-col middle">
                <div class="logo">
                <?php
                $location = ( is_front_page() || is_page( 'start-neu-928' ) ) ? 'home' : 'nohome';
                if ( is_page( 'start-neu-928' ) ) {
                    ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img class="logo-img site-title site-title-<?php echo esc_attr( $location ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/img/juliana_blumenschein_logo_red.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) . ' logo' ); ?>">
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <h1 class="site-title site-title-<?php echo esc_attr( $location ); ?>"><?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?></h1>
                    </a>
                    <?php
                }
                ?>
                <p>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> Juliana Blumenschein</p>
                </div>
            </div>
            <div class="footer-col right">
                <div id="primary-menu-footer">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-4',
                        'menu_id'        => 'primary-footer',
                    ) );
                    ?>
                </div>
            </div>
        </div>    
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>

