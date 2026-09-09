<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package julianablumenschein
 */

?>

    <?php 
/*$pages = get_pages(); 
foreach ($pages as $page_data) {
     $content = apply_filters(‘the_content’, $page_data->post_content); 
     $title = $page_data->post_title; 
     ?> 
    <p> <?php echo $content; ?> </p> <?php 
}
*/
?>

<!--<article id="post-<?php // the_ID(); ?>" <?php // post_class(); ?>>    -->

	<!--<header class="entry-header">
        <h1 class="title site-title"><?php //bloginfo( 'name' ); ?></h1>
	</header><!-- .entry-header -->

	<?php //julianablumenschein_post_thumbnail(); ?>

	<div class="entry-content">
        
    <?php get_template_part( 'template-parts/content', 'about' ); ?>
    <?php get_template_part( 'template-parts/content', 'videos' ); ?>  
    <?php get_template_part( 'template-parts/content', 'bands' ); ?>  
    <?php get_template_part( 'template-parts/content', 'dates' ); ?>
    <?php get_template_part( 'template-parts/content', 'news' ); ?>
    <?php get_template_part( 'template-parts/content', 'contact' ); ?>      
    <?php get_template_part( 'template-parts/content', 'newsletter' ); ?>
		<?php
/*
        the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'julianablumenschein' ),
			'after'  => '</div>',
		) );
*/
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'julianablumenschein' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
<!--</article>--><!-- #post-<?php the_ID(); ?> -->
