<div id="contact">
    <div class="section-content centered">
        <?php
        $post_id = 94;
        $queried_post = get_post($post_id);
        ?>
        <h2><?php echo $queried_post->post_title; ?></h2>
        <?php echo do_shortcode( $queried_post->post_content ); ?>
        <?php
        /*
         $query = new WP_Query(array(
        'post_type' => 'contact',
        'post_status' => 'publish'
    ));    
    while ($query->have_posts()) {    
            $query->the_post();
            $post_id = get_the_ID();
            $linktext = get_post_meta( $post_id, 'rw_linktext', true );
            $url = get_post_meta( $post_id, 'rw_url', true );
        */
        ?>
    </div>
</div>