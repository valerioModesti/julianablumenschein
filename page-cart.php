<?php
/*
Theme Name: Cart
*/

get_header();
?>

	<div id="primary" class="content-area cart">
		<main id="main" class="site-main">

            <?php
            // Start the Loop.
            while ( have_posts() ) :
                the_post();
            endwhile;
            ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
