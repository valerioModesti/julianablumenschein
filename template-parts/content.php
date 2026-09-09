<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package julianablumenschein
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- content -->
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				julianablumenschein_posted_on();
				julianablumenschein_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php julianablumenschein_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'julianablumenschein' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'julianablumenschein' ),
			'after'  => '</div>',
		) );
		?>
		
		<?php
		$query = new WP_Query(array(
			'post_type' => 'post',
			'post_status' => 'publish'
		));  
		while ($query->have_posts()) {  
			$query->the_post();
			$post_id = get_the_ID();
			$linktext = get_post_meta( $post_id, 'rw_linktext', true );
			$url = get_post_meta( $post_id, 'rw_url', true );
		};
		?>
		<div class="cta-wrap">    
			<?php
			echo "<a class='btn cta' target='_blank' href='$url' title='$linktext'>$linktext</a>"; 
			echo $post_id."hallo";
			?>        
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php julianablumenschein_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
