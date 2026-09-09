<?php
    // Post ID 39 - Instagram
    $post_id = 39;
    $queried_post = get_post( $post_id );
    $linktext = get_post_meta( $post_id, 'rw_linktext', true );
    $url = get_post_meta( $post_id, 'rw_url', true );
    
    // News Posts Loop
    $args = array (
        'post_type' => 'news',
        'post__not_in' => array(39)
    );
    $the_query = new WP_Query( $args );
?>
<div id="news">
    <div class="section-content centered">
        <h2><?php echo $queried_post->post_title; ?></h2>	
        <?php 
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post(); 
				$newslinktext = get_post_meta( get_the_ID(), 'rw_linktext', true );
                $newsurl = get_post_meta( get_the_ID(), 'rw_url', true );
                $newslinktext1 = get_post_meta( get_the_ID(), 'rw_linktext1', true );
                $newsurl1 = get_post_meta( get_the_ID(), 'rw_url1', true );

		?><!--<?php the_ID(); ?>-->
        <div id="news-container" style="">
            <div class="news-img-container"> 
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="news-text-container">
                <?php the_title('<h3>', '</h3>'); ?>
                <?php the_content();
                if ( !empty($newslinktext) ) : ?>
                <div class="cta-wrap">   
                    <?php echo "<a class='btn cta' target='_blank' href='$newsurl' title='$newslinktext'>$newslinktext</a>"; ?>
                </div>
                <?php endif; 
                if ( (!empty($newslinktext)) && (!empty($newslinktext1)) ) : ?>
                <div class="distancing"></div>
                <?php endif; 
                if ( !empty($newslinktext1) ) : ?>
                <div class="cta-wrap">   
                    <?php echo "<a class='btn cta' target='_blank' href='$newsurl1' title='$newslinktext1'>$newslinktext1</a>"; ?>
                </div>
                <?php endif; ?> 
            </div>
        </div>
        <?php 
        }
            } else {
            // no posts found
            echo '<!-- no news posts found -->';
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
        <p><?php echo do_shortcode( $queried_post->post_content ); ?></p>
        <?php if ( !empty($newslinktext) ) : ?>
        <div class="cta-wrap">   
            <?php echo "<a class='btn cta' target='_blank' href='$url' title='$linktext'>$linktext</a>"; ?>
        </div>
        <?php endif; ?>
    </div>
</div>