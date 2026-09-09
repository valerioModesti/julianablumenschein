<div id="about">
    <div class="section-content centered">
    <?php
    $post_id = 16; // ID #23 -> commerciale
    $queried_post = get_post($post_id);
    ?>
    <h2><?php echo $queried_post->post_title; ?></h2>
    <p><?php echo apply_filters('the_content',$queried_post->post_content); ?></p>
    </div>
</div>