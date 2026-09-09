<div id="newsletter">
    <div class="section-content centered">
        <?php
        $post_id = 111;
        $queried_post = get_post($post_id);
        ?>
        <h2><?php echo $queried_post->post_title; ?></h2>
        <?php echo do_shortcode( $queried_post->post_content ); ?>
    </div>
</div>