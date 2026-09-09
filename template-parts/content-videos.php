<div id="videos">
    <div class="section-content centered">
        
    <?php
        /*
    $post_id = 38;
    $queried_post = get_post($post_id);
    $linktext = get_post_meta( $post_id, 'rw_linktext', true );
    $url = get_post_meta( $post_id, 'rw_url', true );
    */
        ?>
    <!--<h2><?php // echo $queried_post->post_title; ?></h2>-->
    <!--<p><?php //echo $queried_post->post_content; ?></p>-->
        
        
    <?php
    $query = new WP_Query(array(
        'post_type' => 'videos',
        'post_status' => 'publish'
    ));    
    while ($query->have_posts()) {    
            $query->the_post();
            $post_id = get_the_ID();
            $linktext = get_post_meta( $post_id, 'rw_linktext', true );
            $url = get_post_meta( $post_id, 'rw_url', true );
        ?>
        <h2><?php echo the_title(); ?></h2>
        <div id="videos-wrap" class="swiper-container">
            <!--<div class="swiper-wrapper">-->
                <?php echo the_content(); ?>
            <!--</div>-->
            <!--<div class="swiper-pagination"></div>-->
            <!--<div class="swiper-button-prev"></div>-->
            <!--<div class="swiper-button-next"></div>-->
        </div>
    <?php
    };
    ?>
        <div class="cta-wrap">    
            <?php
            echo "<a class='btn cta' target='_blank' href='$url' title='$linktext'>$linktext</a>"; 
            ?>        
        </div>
    </div>
</div>