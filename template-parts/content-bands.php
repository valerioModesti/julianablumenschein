<div id="bands">
    <div class="section-content centered">
    <?php
		$args = array(
            'post_type' => 'bands',
            'post_status' => 'publish',
			'orderby' => 'menu_order',
			'order'   => 'ASC',
        );
        $query = new WP_Query($args);

    if ($query->have_posts()) { 
    ?>
    <h2>Bands</h2> 
        <!-- band-thumbnails -->
        <div id="band-thumbnails">
        <?php 
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
        ?>
            <div class="band-thumbnail-wrap">
            <?php echo get_the_post_thumbnail( $post_id, 'large', array( 'class' => 'band-thumbnail' ) );?>
            <div class="thumb-caption"><p class="caption-text"><?php echo the_title(); ?></p></div>
            </div>
        <?php    
        }
        ?>
        </div>
        <!-- band-thumbnails -->
        <div id="bands-container">    
        <?php
        while ($query->have_posts()) {      
                $query->the_post();
                $post_id = get_the_ID();
                ?>
                <div class="band">
                    <h3><?php echo the_title(); ?></h3>
                    <div class="single-band-thumbnail-wrap">
                        <?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'band-img' ) );?>
                    </div>
                    <div class="band-text"><?php echo the_content(); ?></div>
                </div>
            <?php
            }

            wp_reset_query();
        };
        ?>
        </div>    
    </div>
</div>