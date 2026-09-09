<div id="dates">
    <div class="section-content centered">
    <?php
        $query = new WP_Query(array(
            'post_type' => 'dates',
            'post_status' => 'publish',
            'posts_per_page'=>-1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        ));

    if ($query->have_posts()) { 
        echo '<h2>Dates</h2>';

        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $gigdate = get_post_meta( $post_id, 'rw_date', true );
    $gigband = get_post_meta( $post_id, 'rw_group', true );
    $gigvenue = get_post_meta( $post_id, 'rw_venue', true ); $giglink = get_post_meta( $post_id, 'rw_venueurl', true );     

    echo "<div class='date'><p>";

    if ( !empty( $giglink ) ) {        
        echo "<a class='giglink' target='_blank' href='$giglink' title='$gigdate.-.$gigband.-.$gigvenue'>";
    }
    echo "<span class='gigdate'>".$gigdate."</span> ".$gigband." @ ".$gigvenue;
    if ( !empty( $giglink ) ) {         
            echo "</a>";
    };
    echo "</p></div>";
    }

    wp_reset_query();
    };
    ?>
    </div>
</div>