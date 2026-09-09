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
	<!-- content-post -->
	<div class="entry-content">
        <div id="corporate">
            <div class="section-content centered">            
            <?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;
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
		$linktext = rwmb_meta( 'rw_linktext' );
		$url = rwmb_meta( 'rw_url' );
		
		if ( !empty($linktext)) :
		?>	
		<div class="cta-wrap nonabsolute-single">    
		<?php
		echo "<a class='btn cta' target='_blank' href='$url' title='$linktext'>$linktext</a>"; 
		//echo $post_id."hallo";
		?>        
		</div>				
		<?php 
		else :
		echo "";
		endif;	
		/*
		 *****REVIEW*****
		$query = new WP_Query(array(
		)); 
		while ($query->have_posts()) {  
			$query->the_post();
			$post_id = get_the_ID();
			$linktext = get_post_meta( $post_id, 'rw_linktext', true );
			$url = get_post_meta( $post_id, 'rw_url', true );
		};
		$value = rwmb_meta( 'rw_linktext' );
		*/
				?>
            </div><!-- #corporate -->  
        </div><!-- .section-content.centered -->     
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
