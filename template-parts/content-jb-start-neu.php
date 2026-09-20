<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package julianablumenschein
 */

?>

<div class="entry-content">
	<?php get_template_part( 'template-parts/content', 'about' ); ?>
	<?php get_template_part( 'template-parts/content', 'videos' ); ?>  
	<?php get_template_part( 'template-parts/content', 'bands' ); ?>  
	<?php get_template_part( 'template-parts/content', 'dates' ); ?>
	<?php get_template_part( 'template-parts/content', 'news' ); ?>
	<?php get_template_part( 'template-parts/content', 'contact' ); ?>      
	<?php get_template_part( 'template-parts/content', 'newsletter' ); ?>
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
<!-- #post-<?php the_ID(); ?> -->