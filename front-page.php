<?php
/**
 * Front-page template for the new start page.
 *
 * @package julianablumenschein
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'jb-start-neu' );
			endwhile;
		endif;
		?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>