<?php
/*
Theme Name: Cart
*/

get_header();
?>

	<div id="primary" class="content-area cart">
		<main id="main" class="site-main">
        <!-- Warenkorb! -->
            <?php
            // Start the Loop.
            while ( have_posts() ) :
                the_post();
            ?>    
            <div class="section-content centered">
                <h2><?php the_title(); ?></h2>
            <?php   
                the_content();
                // Include the page content template.
				get_template_part( 'content', 'page' );
            endwhile;
            ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
