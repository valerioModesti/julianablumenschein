<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package julianablumenschein
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
            $slug = get_post_field( 'post_name', get_post() );
			if ( is_cart() || is_checkout() ) :
    			echo "<!-- This is the cart, or checkout page. More precisely the $slug page! -->";
                // Start the Loop.
                while ( have_posts() ) :
                    the_post();
                endwhile;
			else :
                if ( have_posts() ) :
                echo "<!--<span>I'm the one!</span><header><h1 class='page-title screen-reader-text title site-title'> // bloginfo( 'name' ); </h1></header>-->";
                get_template_part( 'template-parts/content', 'jb-start-neu' );
                endif;
            endif;
            ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();